<?php

/*
 * This file is part of Filter.
 * (c) Magasinet Filter, Offside Press AB.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

setlocale(LC_ALL, 'sv_SE');

// Register plugin helpers.
require_once template_path('includes/plugins/plate.php');

// Set theme defaults.
add_action('after_setup_theme', function () {
    show_admin_bar(false);

    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 theme support.
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);
});

// Remove default post type from admin page
add_action('admin_menu', 'remove_default_post_type');
function remove_default_post_type()
{
    remove_menu_page('edit.php');
}

// Enqueue and register scripts the right way.
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');

    wp_enqueue_style('filter', mix('styles/app.css'));

    wp_register_script('filter', mix('scripts/app.js'), '', '', true);
    wp_enqueue_script('filter');
});

// Remove JPEG compression.
add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);

// Load custom fields and post types
add_action('init', function () {
    require_once template_path('custom_posts/index.php');
    require_once template_path('custom_fields/index.php');
    require_once template_path('custom_taxonomies/index.php');
    require_once template_path('custom_admin_cols/index.php');
});

// require_once template_path('customizer.php');
