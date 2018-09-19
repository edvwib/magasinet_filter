<?php

/*
 * This file is part of Filter.
 * (c) Magasinet Filter, Offside Press AB.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

register_extended_post_type('magazine', [
    # Add some custom columns to the admin screen:
    'admin_cols' => array(
        'published' => array(
            'title'       => 'Publicerad',
            'meta_key'    => 'metadata_release',
            'date_format' => 'Y/m/d',
            'default'     => 'DESC',
        ),
    ),
], [
    'singular' => 'Magasin',
    'plural'   => 'Magasin',
    'slug'     => 'magasin'
]);
