<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMUJS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css')?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="head-banner">
        <div class="px-10 py-5 flex justify-between">
            <a href="" class="flex">
                <img src="<?php echo base_url('assets/images/logo.png')?>" alt="">
                <div class="logo-title flex flex-col p-2 justify-center" style="font-size: 16px;">
                    <p>Central Mindanao University</p>
                    <p>Journal of Science</p>
                </div>
            </a>
            <div class="authentication flex items-center">
                <a href="<?php echo base_url('login')?>" class="p-5">Login</a>
                <a href="" class="p-5">Sign Up</a>
            </div>
        </div>
    </div>
    <div class="main-nav px-10 py-2 flex justify-between items-center" style="background-color: #034824; color: white;">
        <ul class="flex">
            <li class="px-3 py-2">
                <a href="<?php echo base_url('homepage')?>">Home</a>
            </li>
            <li class="px-3 py-2">
                <a href="<?php echo base_url('current')?>">Current Issue</a>
            </li>
            <li class="px-3 py-2">
                <a href="<?php echo base_url('articles')?>">Articles</a>
            </li>
            <li class="px-3 py-2">
                <a href="<?php echo base_url('archives')?>">Archive</a>
            </li>
            <li class="px-3 py-2">
                <a href="<?php echo base_url('about') ?>">About the Journal</a>
            </li>
        </ul>
    </div>
    <div class="grid grid-cols-12 main-container">