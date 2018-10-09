<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#1A1A1A">
    <link rel="shortcut icon" href="/themes/filter/assets/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="/themes/filter/assets/manifest.json">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header>
        <nav role="navigation">
            <a href="/" class="logoContainer">
                <img src="/themes/filter/assets/logo.svg" alt="filter logga">
            </a>
            <div class="menuIcon">
                <div class="icon"></div>
            </div>

            <div class="menuDrawer">
                <?php if (is_user_logged_in()): ?>
                    <a href="<?= wp_logout_url('/'); ?>" class="menuItem btn logout">LOGGA UT</a>
                <?php else: ?>
                    <a href="#" class="menuItem btn login">LOGGA IN</a>
                    <a href="#" class="menuItem btn subscribe">BÖRJA PRENUMERERA</a>
                <?php endif; ?>

                <div class="loginView">
                    <div class="close"></div>
                    <?php wp_login_form(); ?>
                </div>
                <a href="/" class="menuItem">HEM</a>
                <a href="#" class="menuItem">MAGASINET</a>
                <a href="#" class="menuItem">FILTERBUBBLAN</a>
                <a href="#" class="menuItem">HJÄLPCENTER</a>
                <a href="#" class="menuItem">SHOP</a>
            </div>
        </nav>
    </header>
