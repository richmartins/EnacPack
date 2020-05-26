<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="<?=base_url()?>favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/main.css"/>
        <title><?= $title ?> | EnacPack</title>
    </head>
    <body>
    <div id="header-navbar">
        <?php if (!isset($_SESSION['user'])): ?>
                <a class="item-barNav"href="<?= base_url(); ?>auth/login"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
            <?php else: ?>
                <a class="item-barNav"href="<?= base_url(); ?>auth/settings"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                <a class="item-barNav"href="<?= base_url(); ?>auth/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <?php endif; ?>
        <i class="fas fa-bars" onclick="showBarNav();"></i>
    </div>
    <div id="header-container">
        <div id="header-title">
            <a href="<?= base_url() ?>">
                <img src="<?= base_url(); ?>public/enacpacklogo.png" height="85px"/>
                <span>ENACPACK</span>
            </a>
            <span><?= $description ?></span>
        </div>
    </div>