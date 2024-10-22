<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/global.css">
    <link rel="stylesheet" href="/public/css/error.css">
    <title>(┬┬﹏┬┬) Linkin Purry Error</title>
</head>
<body>
<section class="error-page">
    <img src="/public/asset/logo-wbd.png" alt="logo"/>
    <img src="/public/asset/perry-error.png" alt="logo"/>
    <h2><?php echo $errorCode . ' | ' . $data['message']; ?></h2>
    <h4><?php echo $desc ?></h4>

</section>
</body>
</html>
