<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('landing/paper.min.css'); ?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="<?= base_url('landing/main.css'); ?>">
</head>
<body>
<header>
    <nav>
        <h1 class="logo">
            LOGO FONT
        </h1>
        <button onclick="menu()" class="menu_open"><i class="fas fa-ellipsis-v"></i></button>

        <div class="m_menu">
            <button onclick="menu()" class="menu_close">&times;</button>
            <ul class="normal">
                <li><a href="<?= base_url('home');?>" class="active">Home</a></li>
                <li><a href="<?= base_url('home');?>" class="active">About</a></li>
                <li><a href="<?= base_url('home');?>" class="active">Contact</a></li>
                <li class="menu_o">
                    <a>More</a>
                    <ul class="down-menu">
                        <li><a href="<?= base_url('dashboard');?>">Dashboard</a></li>
                        <li><a href="<?= base_url('user');?>">Profile</a></li>
                        <li><a href="<?= base_url('bookcontroller');?>">BookList</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="user">
                <li><a class="button signin" href="<?= base_url('home/signIn');?>">SignIn</a></li>
                <li><a class="button signup" href="<?= base_url('home/signUp');?>">SignUp</a></li>
            </ul>
        </div>
    </nav>
</header>
