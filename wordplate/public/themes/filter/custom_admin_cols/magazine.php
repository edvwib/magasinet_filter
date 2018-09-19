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
function add_acf_columns($columns)
{
    return array_merge($columns, [
        'number' => __('Nummer'),
    ]);
}
add_filter('manage_magazine_posts_columns', 'add_acf_columns');


/*
* Add columns to exhibition post list
*/
function magazine_custom_column($column, $post_id)
{
    switch ($column) {
        case 'number':
        // echo get_post_meta ($post_id, 'number', true);
        the_field('metadata_number', $post_id);
        break;
    }
}
add_action('manage_magazine_posts_custom_column', 'magazine_custom_column', 10, 2);

/*
* Make custom column sortable
*/
// add_filter( 'manage_magazine_sortable_columns', 'magazine_sortable_column' );
// function magazine_sortable_column($columns) {
//     $columns['number'] = 'number';
//     return $columns;
// }
