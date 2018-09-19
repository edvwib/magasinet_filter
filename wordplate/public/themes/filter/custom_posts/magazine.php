<?php

/*
 * This file is part of Filter.
 * (c) Magasinet Filter, Offside Press AB.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

register_extended_post_type('magazine', [
    'admin_cols' => [
        'published' => [
            'title'       => 'Publicerad',
            'meta_key'    => 'metadata_release',
            'date_format' => 'Y/m/d',
            'default'     => 'DESC',
        ],
    ],
    'labels' => [
        'name'          => __('Magasin'),
        'menu_name' => __('Magasin'),
        'singular_name' => __('Magasin'),
        'plural_name' => __('Magasin'),
        'all_items' => __('Alla magasin'),
        'add_new_item' => __('Lägg till nytt magasin'),
        'add_new' => __('Lägg till nytt magasin'),
        'search_items' => __('Sök efter magasin'),
        'edit_item' => __('Redigera magasin'),
    ],
    'rewrite'     => array( 'slug' => 'magasin' ),
    'menu_icon' => 'dashicons-book-alt',
]);
