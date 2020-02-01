<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">         
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/main.css"/>
        <title><?= $title ?> | EnacPack</title>
    </head>
    <body>
    <div id="header-navbar">
        <button id="btn-login" class=""><a href="<?= base_url(); ?>auth/login">Login</a></button>
        <button id="btn-login" class=""><a href="<?= base_url(); ?>auth/logout">Logout</a></button>
    </div>
    <div id="header-container">
        <div id="header-title">
            <h4><a href="<?= base_url() ?>">ENACPACK</a></h4>
            <span><?= $description ?></span>
        </div>
    </div>