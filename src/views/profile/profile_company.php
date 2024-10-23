<?php

use app\core\Application;

include_once Application::$_BASE_DIR . 'src/views/component/navbar.php';

$profile = $data['profile'];

$company_id = $profile['id'];
$company_name = $profile['name'];
$company_lokasi = $profile['lokasi'];
$company_about = $profile['about'];
$company_bidang = $profile['bidang'];
$company_pp_path = $profile['pp_path'] ? '/asset' . $profile['pp_path'] : 'public/asset/default-profile.png';
$company_header_path = 'public/asset/header-bg.png';
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($company_name); ?></title>
    <link rel="stylesheet" href="../public/css/company_profile.css">
</head>
<body>
    <?php include '../component/navbar.php'; ?>
    
    <div class="container">
        <div class="main-content">
            <div class="content-box" style="background-image: url('<?php echo htmlspecialchars($header_background_image_path); ?>');">
                <div class="overlay"></div> 
            </div>
            <div class="company-info">
                <!-- Profile Picture -->
                <div class="company-logo" style="background-image: url('<?php echo htmlspecialchars($company_pp_path); ?>');"></div>
                <div class="info-details">
                    <div class="company-name"><?php echo htmlspecialchars($company_name); ?></div>
                    <div class="info-sub">
                        <span><?php echo htmlspecialchars($company_lokasi); ?></span>
                        <div class="separator"></div>
                        <span><?php echo htmlspecialchars($company_bidang); ?></span>
                    </div>
                    <!-- Edit Button -->
                    <div class="edit-button-wrapper">
                        <a href="edit.php?id=<?php echo htmlspecialchars($company_id); ?>" class="edit-button">Edit</a>
                    </div>
                </div>
            </div>
            <div class="about-box">
                <p><?php echo htmlspecialchars($company_about); ?></p>
            </div>
            <div class="about-title">About</div>
            <div class="side-box"></div>
        </div>
    </div>
</body>
</html>

