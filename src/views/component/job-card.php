<?php

$id = $job['lowongan_id'];
$company_nama = $job["nama"];
$job_nama = $job['posisi'];
$job_type = $job['jenis_pekerjaan'];
$location_type = $job['jenis_lokasi'];
$lokasi = $job['lokasi'];
$pp_path = '/public/asset/default-job.png';
?>

<a href="/job/<?= $id ?>" class="job-card">
    <div class="obj-wrapper">
        <div class="job-logo-container">
            <img src="<?= $pp_path ?>" alt="job-logo" class="job-logo">
        </div>
        <div class="job-desc-container">
            <h4 class="text-green"><?= $job_nama ?> (<?= $job_type ?>)</h4>
            <h5 class="text-black"><?= $company_nama ?></h5>
            <h5 class="text-muted"><?= $lokasi ?> (<?= $location_type ?>)</h5>
        </div>
    </div>
    <button class="apply-btn orange-btn">
        <svg width="19" height="26" viewBox="0 0 19 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="3.66095" width="18.9655" height="18.9655" rx="2.78905" fill="white" />
            <path d="M3.01962 18.5V9.64645H5.64355V18.5h4.01962ZM4.32266 8.34341C3.88236 8.34341 3.52537 8.21846 3.25167 7.96856C2.97797 7.71866 2.84112 7.38546 2.84112 6.96896C2.84112 6.55247 2.97797 6.21927 3.25167 5.96937C3.52537 5.71947 3.88236 5.59452 4.32266 5.59452C4.76296 5.59452 5.11996 5.71947 5.39366 5.96937C5.66735 6.21927 5.8042 6.55247 5.8042 6.96896C5.8042 7.38546 5.66735 7.71866 5.39366 7.96856C5.11996 8.21846 4.76296 8.34341 4.32266 8.34341ZM7.95274 18.5V9.64645H10.0947L10.2732 10.771H10.3446C10.7135 10.4021 11.13 10.0867 11.5941 9.82495C12.0582 9.56315 12.5878 9.43225 13.1828 9.43225C14.1586 9.43225 14.8607 9.75355 15.2891 10.3961C15.7175 11.0268 15.9317 11.8955 15.9317 13.0022V18.5H13.3077V13.3414C13.3077 12.6988 13.2185 12.2585 13.04 12.0205C12.8734 11.7825 12.5997 11.6635 12.2189 11.6635C11.8857 11.6635 11.6001 11.7408 11.3621 11.8955C11.1241 12.0383 10.8623 12.2466 10.5767 12.5203V18.5H7.95274Z" fill="#F88103" />
        </svg>
        Easy Apply
    </button>
</a>
