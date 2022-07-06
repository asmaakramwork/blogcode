<?php

require 'config/database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <title>Blog Website</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <nav>
        <div class="container nav-container">
            <a class="nav-logo" href="<?= ROOT_URL ?>index.php">Blogs</a>
            <button id="open-nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close-nav-btn"><i class="uil uil-times-circle"></i></button>
            <ul class="nav-items">
                <li><a href="<?= ROOT_URL ?>About.php">About</a></li>
                <li><a  href="<?= ROOT_URL ?>Blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                <li><a href="<?= ROOT_URL ?>Signup.php">Signup</a></li>
                <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>


                <li class="nav-profile">
                    <div class="profilepic"></div>
                    <image src="" alt="">
        </div>
        <li>
            </ul>

            </div>
    </nav>

