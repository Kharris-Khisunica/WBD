<?php
$job = $data['job'];
$applicants = $data['applicants'];

$id = $job['lowongan_id'];
$job_nama = $job['posisi'];
$company_nama = $job['nama'];
$lokasi = $job['lokasi'];
$job_type = $job['jenis_pekerjaan'];
$location_type = $job['jenis_lokasi'];
$description = $job['deskripsi'];
$pp_path = '/public/asset/default-job.png';
?>
<section>
    <div class="job-details-wrapper">
        <div class="job-details-card">
            <div class="job-details-container">
                <div class="header-details">
                    <div class="company-profile">
                        <div class="logo-container-pic">
                            <img src="/public/asset/default-job.png" alt="logo" class="logo-img">
                        </div>
                        <h5><?= $company_nama ?></h5>
                    </div>
                    <button class="green-btn">Edit Listing</button>
                </div>
                <h2><?= $job_nama ?></h2>
                <h5 class="text-muted"><?= $lokasi ?></h5>
                <div class="chip-container">
                    <img src="/public/asset/briefcase.png" alt="briefcase" class="briefcase">
                    <p class="chip bg-green-400"><?= $location_type ?></p>
                    <p class="chip bg-orange-300"><?= $job_type ?></p>
                </div>
            </div>
            <div class="navigation-tabs">
                <button class="tab-link navigation-btn" data-tab="jobDescription" id="defaultOpen">Description</button>
                <button class="tab-link navigation-btn" data-tab="applicants">Applicants</button>
            </div>
        </div>
        <div class="job-content-card">
            <div id="jobDescription" class="tab-content active-tab">
                <p><?= $description ?></p>
            </div>
            <div id="applicants" class="tab-content">
                <div class="applicant-card">
                    <div class="pagination-cards">
                        <?php
                        require_once __DIR__ . "/../component/applicant-cards.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script defer src="/public/js/job-detail.js"></script>