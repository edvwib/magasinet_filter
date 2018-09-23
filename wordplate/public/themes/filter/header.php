<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#5ab10d">
  <link rel="shortcut icon" href="/themes/filter/assets/favicon.ico" type="image/x-icon">
  <link rel="manifest" href="/themes/filter/assets/manifest.json">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header>
        <nav role="navigation">
            <?php wp_nav_menu(['theme_location' => 'primary-menu']); ?>
        </nav>
    </header>
