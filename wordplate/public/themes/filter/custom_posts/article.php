<?php

/*
 * This file is part of Filter.
 * (c) Magasinet Filter, Offside Press AB.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

register_extended_post_type('article', [
    'admin_cols' => [
        'published' => [

        ],
    ],
    'labels' => [
        'name'          => __('Artikel'),
        'menu_name' => __('Artiklar'),
        'singular_name' => __('Artikel'),
        'plural_name' => __('Artiklar'),
        'all_items' => __('Alla artiklar'),
        'add_new_item' => __('Lägg till ny artikel'),
        'add_new' => __('Lägg till ny artikel'),
        'search_items' => __('Sök efter artikel'),
        'edit_item' => __('Redigera artikel'),
    ],
    'rewrite'     => array( 'slug' => 'artikel' ),
    'menu_icon' => 'dashicons-text',
]);
