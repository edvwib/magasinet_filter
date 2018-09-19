<?php

declare(strict_types=1);

register_extended_post_type('magazine', [
    # Add some custom columns to the admin screen:
    'admin_cols' => array(
        'featured_image' => array(
            'title'          => 'Omslag',
            'featured_image' => 'magazine'
        ),
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
