<!DOCTYPE html>
<html lang="en">
<head>

    <?php
        // Start sessie
        session_start();

        // Get name of running server
        $name = $_SERVER['SERVER_NAME'];

        // Get root name and take only last item of path
        $parts = explode(DIRECTORY_SEPARATOR, dirname(__DIR__));
        $last = end($parts);

        // Check wether the outcome is local or online and return path
        if ($name === 'localhost') {
            $path = DIRECTORY_SEPARATOR . $last . DIRECTORY_SEPARATOR;
        } else if ($name === 'webdaan.nl') {
            $path = DIRECTORY_SEPARATOR;
        }
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $path . 'images/favicons/color-no-bg.png' ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $path . 'images/favicons/favicon-32x32.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $path . 'images/favicons/favicon-16x16.png' ?>">
    <link rel="manifest" href="<?= $path . 'images/favicons/site.webmanifest' ?>">

    <!-- Title of site -->
    <title>WebDaan</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= $path . 'css/style.css' ?>">
    <link rel="stylesheet" href="<?= $path . 'css/header.css' ?>">
    <link rel="stylesheet" href="<?= $path . 'css/custom.min.css' ?>">
</head>
<body>