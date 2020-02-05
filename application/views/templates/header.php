<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">         
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/main.css"/>
        <title><?= $title ?> | EnacPack</title>
    </head>
    <body>
    <div id="header-navbar">
        <?php if ($logged === null): ?>
                <a href="<?= base_url(); ?>auth/login"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
            <?php else: ?>
                <a href="<?= base_url(); ?>auth>"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                <a href="<?= base_url(); ?>auth/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <?php endif; ?>
    </div>
    <div id="header-container">
        <div id="header-title">
            <h4><a href="<?= base_url() ?>">ENACPACK</a></h4>
            <span><?= $description ?></span>
        </div>
    </div>