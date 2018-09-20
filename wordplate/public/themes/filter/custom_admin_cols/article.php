<?php

/*
 * This file is part of Filter.
 * (c) Magasinet Filter, Offside Press AB.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);


/*
* Add columns to magazine post list
*/
function add_article_acf_columns($columns)
{
    return array_merge($columns, [
        'published' => __('Publicerad'),
        'number' => __('Nummer'),
    ]);
}
add_filter('manage_article_posts_columns', 'add_article_acf_columns');


/*
* Add columns to exhibition post list
*/
function article_custom_column($column, $post_id)
{
    switch ($column) {
        case 'published':
        $magazineId = get_field('metadata_magazine', $post_id)[0]->ID;
        the_field('metadata_release', $magazineId);
        break;
        case 'number':
        // echo get_post_meta ($post_id, 'number', true);
        the_field('metadata_number', $post_id);
        break;
    }
}
add_action('manage_article_posts_custom_column', 'article_custom_column', 10, 2);

add_filter('manage_article_sortable_columns', 'sortable_article_column');
function sortable_article_column($columns)
{
    return array_merge($columns, [
        'published' => __('date'),
    ]);

    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);
}
