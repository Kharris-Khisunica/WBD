<?php

use App\core\Application;

include_once Application::$_BASE_DIR . 'src/views/component/navbar.php';

$profile = $data['profile'];

$jobseeker_id = $profile['id'];
$jobseeker_name = $profile['name'];
$jobseeker_education = $profile['education'];
$jobseeker_about = $profile['about'];
$jobseeker_experience = $profile['experience'];
$jobseeker_skill = $profile['skill'];
$jobseeker_pp_path = $profile['pp_path'] ? '/asset' . $profile['pp_path'] : 'public/asset/default-profile.png';
$jobseeker_header_path = 'public/asset/header-bg.png';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($jobseeker_name); ?></title>
    <link rel="stylesheet" href="../public/css/jobseeker_profile.css">
</head>

<body>


</body>
</html>