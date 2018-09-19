<?php

/*
 * This file is part of Filter.
 * (c) Magasinet Filter, Offside Press AB.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

register_extended_taxonomy('article_theme', 'article', [
    'meta_box' => 'simple',
    'checked_ontop' => true,
    'dashboard_glance' => true,
    'admin_cols' => [
        'title',
    ],
    'allow_hierarchy' => false,
    'labels' => [
        'name'          => __('Teman'),
        'menu_name' => __('Teman'),
        'singular_name' => __('Tema'),
        'plural_name' => __('Teman'),
        'all_items' => __('Alla teman'),
        'add_new_item' => __('Lägg till nytt tema'),
        'add_new' => __('Lägg till nytt tema'),
        'search_items' => __('Sök efter tema'),
        'edit_item' => __('Redigera teman'),
        'not_found' => __('Inga teman hittades'),
    ],
]);

register_extended_taxonomy('article_category', 'article', [
    'meta_box' => 'simple',
    'checked_ontop' => true,
    'dashboard_glance' => true,
    'admin_cols' => [
        'title',
    ],
    'allow_hierarchy' => false,
    'labels' => [
        'name'          => __('Kategorier'),
        'menu_name' => __('Kategorier'),
        'singular_name' => __('Kategori'),
        'plural_name' => __('Kategorier'),
        'all_items' => __('Alla Kategorier'),
        'add_new_item' => __('Lägg till ny kategori'),
        'add_new' => __('Lägg till ny kategori'),
        'search_items' => __('Sök efter kategori'),
        'edit_item' => __('Redigera kategori'),
        'not_found' => __('Inga Kategorier hittades'),
    ],
]);
