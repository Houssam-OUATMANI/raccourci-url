<?php

use App\Config\Session;

$session = new Session();
?>

<!DOCTYPE html>
<html lang="en" data-theme="cyberpunk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body class="container mx-auto">
    <?php require __DIR__ . "/components/navbar.php";?>

    <?php $key = "success"; require __DIR__ . "/components/flash.php";?>

    <?php $key = "error"; require __DIR__ . "/components/flash.php"; ?>

    <?= $content ?? '' ?>
</body>

</html>