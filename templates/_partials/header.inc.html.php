<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $view->escape($title) ?> - <?= site_name() ?></title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= site_url('/assets/materialize/css/materialize.css') ?>" rel="stylesheet" media="screen,projection"/>
    <link href="<?= site_url('/assets/css/style.css') ?>" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<?php include 'top-menu.inc.html.php' ?>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <div class="section">
            <?php include 'messages.inc.html.php' ?>
