<?php

namespace app\repositories;

use app\core\Repository;

class JobRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllJobs($options = [])
    {
        $options['take'] = 5;

        $selectJobsQuery = 'SELECT j.*, c.nama,cd.lokasi , cd.pp_path ';
        $query = 'FROM lowongan AS j
              JOIN users AS c ON j.company_id = c.user_id
              JOIN company_detail AS cd ON c.user_id = cd.user_id ';

        $params = [];
        $isFiltered = false;

        if (isset($options['jobTypes']) && !empty($options['jobTypes'])) {
            $query .= 'WHERE ';
            $jobTypeConditions = [];
            foreach ($options['jobTypes'] as $jobType) {
                $jobTypeConditions[] = "j.jenis_pekerjaan = :jobType_{$jobType}";
                // Merge new parameter for job types
                $params = array_merge($params, ["jobType_{$jobType}" => $jobType]);
            }
            $query .= implode(' OR ', $jobTypeConditions);
            $isFiltered = true;
        }

        if (isset($options['locationTypes']) && !empty($options['locationTypes'])) {
            if ($isFiltered) {
                $query .= ' AND ';
            } else {
                $query .= 'WHERE ';
                $isFiltered = true;
            }
            $locationConditions = [];
            foreach ($options['locationTypes'] as $locationType) {
                $locationConditions[] = "j.jenis_lokasi = :locationType_{$locationType}";
                // Merge new parameter for location types
                $params = array_merge($params, ["locationType_{$locationType}" => $locationType]);
            }
            $query .= implode(' OR ', $locationConditions);
        }

        if (isset($options['search']) && !empty($options['search'])) {
            if ($isFiltered) {
                $query .= ' AND ';
            } else {
                $query .= 'WHERE ';
                $isFiltered = true;
            }
            $searchTerm = '%' . $options['search'] . '%'; // Prepare the search term
            $query .= 'j.posisi ILIKE :search';
            $params = array_merge($params, ['search' => $searchTerm]);
        }

        if (isset($options['sort'])) {

            if ($options['sort'] === 'latest') {
                $query .= ' ORDER BY j.created_at DESC';
            } elseif ($options['sort'] === 'oldest') {
                $query .= ' ORDER BY j.created_at ASC';
            }
        }

        $selectJobsQuery .= $query;

        [$paginationQuery,$totalPages] = $this->paginate($selectJobsQuery,$options,$params);

        
        return [$this->getAll($paginationQuery,$params), $totalPages];
    }

    public function getJobById($jobId){
        $selectJobsQuery = 'SELECT j.*, c.nama,cd.lokasi , cd.pp_path ';
        $query = 'FROM lowongan AS j
              JOIN users AS c ON j.company_id = c.user_id
              JOIN company_detail AS cd ON c.user_id = cd.user_id ';
        $query .= 'WHERE j.lowongan_id = :id';
        $params = ['id' => $jobId];

        $selectJobsQuery .= $query;
        return $this->getOne($selectJobsQuery,$params);

    }
}