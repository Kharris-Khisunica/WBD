<?php
use app\core\Application;

include_once Application::$_BASE_DIR . 'src/views/component/navbar.php';
$landing_img_path = 'src/public/asset/landing_image';

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="src/public/css/landing.css">
        <title>LinkinPurry</title>
    </head>

    <body>

        <div class="">
            <h1 class="welcome-msg">Welcome to LinkinPurry</h1>

            <div class="buttons">
                <a href="" class="button signup-button"></a>
                <a href="" class="button sigin-button"></a>
            </div>
            <img src="<?php echo htmlspecialchars($landing_img_path) ?>", class="landing-img">
                
        </div>

    </body>



</html>