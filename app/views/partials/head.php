<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Keywords" content="TSU NEWS" />
    <meta name="Description" content="TSU NEWS" />
    <meta name="Reply-to" content="example@domain.com" />
    <meta name="Author" content="David Kuzanashvili">
    <title>Document</title>
    <link rel="stylesheet" href="/public/libs/swiper/swiper.min.css">
    <link rel="stylesheet" href="/public/fonts/fonts.css">
    <link rel="stylesheet" href="/public/dist/app.css">
</head>
<body>

<header class="page-space grad-white-blue navigation">
    <?php require('menu/nav.php'); ?>
    <div class="sign-x">
        <?php if (!isset($_COOKIE['identity'])): ?>
                <a href="/login">Sign in</a>
                <span>/</span>
                <a href="/registration">Sign up</a>
        <?php else: ?>
            <a href="/log-out">Log out</a>
        <?php endif; ?>
    </div>

</header>
