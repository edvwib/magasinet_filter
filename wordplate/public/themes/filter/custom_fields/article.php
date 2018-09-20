<?php

/*
 * This file is part of Filter.
 * (c) Magasinet Filter, Offside Press AB.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

$fields = [
    acf_group([
        'name' => 'introduction',
        'label' => 'Introduktion',
        'sub_fields' => [
            acf_wysiwyg([
                'name' => 'summary',
                'label' => 'Sammanfattning',
                'instructions' => 'En kort sammanfattning av vad artikeln handlar om.',
                'required' => true,
                'media_upload' => false,
                'tabs' => 'visual',
                'toolbar' => 'simple',
            ]),
            acf_image([
                'name' => 'cover',
                'label' => 'Omslag',
                'instructions' => 'Omslag för artikeln.',
                'required' => true,
                'mime_types' => '.jpg, .jpeg, .png, .svg',
                'return_value' => 'object',
            ]),
            acf_text([
                'name' => 'image_owner',
                'label' => 'Illustration/Foto',
                'instructions' => 'Personen som har skapat/tagit bilden för artikeln.',
                'required' => true,
            ]),
        ],
    ]),
    acf_group([
        'name' => 'metadata',
        'label' => 'Metadata',
        'sub_fields' => [
            acf_text([
                'name' => 'author',
                'label' => 'Författare',
                'instructions' => 'Personen som har skrivit artikeln.',
                'required' => true,
            ]),
            acf_relationship([
                'name' => 'magazine',
                'label' => 'Magasin',
                'instructions' => 'Välj det magasin som artikeln publicerades i.',
                'post_type' => ['magazine'],
                'required' => true,
                'filters' => '',
                'max' => 1,
                'min' => 1,
            ]),
        ],
    ]),
    acf_group([
        'name' => 'content',
        'label' => 'Innehåll',
        'sub_fields' => [
            acf_wysiwyg([
                'name' => 'article',
                'label' => 'Artikel',
                'instructions' => 'Allt inneåll för artikeln. Det är även möjligt att lägga in media, exempelvis en bild i texten.',
                'required' => true,
                'media_upload' => true,
                'tabs' => 'visual',
                'toolbar' => 'simple',
            ]),
        ],
    ]),
];

$location = [
    [
        acf_location('post_type', 'article')
    ]
];

acf_field_group([
    'title' => 'article',
    'fields' => $fields,
    'style' => 'seamless',
    'location' => $location,
    'hide_on_screen' => [
        0 => 'the_content',
        1 => 'featured_image',
    ],
]);
