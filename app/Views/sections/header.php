<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/papercss@1.8.2/dist/paper.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="landing/main.css">
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
                <li><a href="" class="active">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li class="menu_o">
                    <a>More</a>
                    <ul class="down-menu">
                        <li><a href="">test</a></li>
                        <li><a href="">test</a></li>
                        <li><a href="">test</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="user">
                <li><a class="button signin" href="">SignIn</a></li>
                <li><a class="button signup" href="">SignUp</a></li>
            </ul>
        </div>
    </nav>
</header>
