<?php include_once __DIR__ . "/../../../config/config.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" href="/public/css/global.css">
    <link rel="stylesheet" href="/public/css/navbar.css">
    <link rel="stylesheet" href="/public/css/{{page}}.css">
    <title>LinkInPurry - {{pageTitle}}</title>
</head>

<body>
    <?php include_once COMPONENT_URL . "navbar.php" ?>
    <main>
        {{content}}
    </main>
</body>

</html>