<?php

use app\core\Application;

// Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If using an MVC framework, make sure paths are correct
include_once Application::$BASE_DIR . '/src/views/component/navbar.php';

// Sample data or fetch it from a database
$jobTitle = $data['profile'];
$jobLocation = "Bandung, Jawa Barat";
$companyName = "Google, Inc";
$jobTypes = ["hybrid", "part-time"];
$jobDescription = "Lorem ipsum dolor sit amet, consectetur adipiscing elit...";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/path/to/styles.css">
    <title>Job Listing</title>
</head>
<body>
    <!-- Header included from navbar.php -->
    <main class="main-content">
        <div class="job-card">
            <h1 class="job-title"><?php echo $jobTitle; ?></h1>
            <p class="job-location"><?php echo $jobLocation; ?></p>
            <!-- Job Type Badges -->
            <div class="job-types">
                <?php foreach ($jobTypes as $type): ?>
                    <span><?php echo $type; ?></span>
                <?php endforeach; ?>
            </div>
            <hr>
            <!-- Company and Edit Button -->
            <div class="company-section">
                <div class="company-info">
                    <div class="company-logo"></div>
                    <span><?php echo $companyName; ?></span>
                </div>
                <button class="edit-button">Edit Listing</button>
            </div>
            <!-- Job Description -->
            <section class="job-description">
                <h2>About</h2>
                <p><?php echo $jobDescription; ?></p>
            </section>
        </div>
    </main>
    <script defer src="/public/js/navbar.js"></script>
</body>
</html>
