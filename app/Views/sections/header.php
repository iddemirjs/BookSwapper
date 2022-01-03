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
            BOOK SWAPPER
        </h1>
        <button onclick="menu()" class="menu_open"><i class="fas fa-ellipsis-v"></i></button>

        <div class="m_menu">
            <button onclick="menu()" class="menu_close">&times;</button>
            <ul class="normal">
                <li><a href="<?= base_url('home'); ?>">Home</a></li>
                <?php if (session()->get('user') && session()->get('user')['usr_type'] === '1'): ?>
                    <li><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                <?php endif ?>
                <li><a href="<?= base_url('bookcontroller'); ?>">BookList</a></li>
                <li><a href="<?= base_url('bookcontroller/bookAdd'); ?>">BookAdd</a></li>
                <li><a href="<?= base_url('user/go_update_user'); ?>">UpdateUser</a></li>
                <li><a href="<?= base_url('authorcontroller'); ?>">AuthorList</a></li>
            </ul>
            <ul class="user">
                <?php if (session()->get('user')): ?>
                    <li><a class="button signin"
                           href="<?= base_url('profile/'.session()->get('user')['usr_id']); ?>">Profile <?= session()->get('user')['usr_username']; ?></a>
                    </li>
                    <li><a class="button signin"
                           href="<?= base_url('user/logout'); ?>">Çıkış</a>
                    </li>
                <?php else: ?>
                    <li><a class="button signin" href="<?= base_url('home/signIn'); ?>">Login</a></li>
                    <li><a class="button signup" href="<?= base_url('home/signUp'); ?>">Register</a></li>
                <?php endif ?>
            </ul>
        </div>
    </nav>
</header>
