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
        'name' => 'magazine',
        'label' => 'Magasinet',
        'sub_fields' => [
            acf_wysiwyg([
                'name' => 'summary',
                'label' => 'Sammanfattning',
                'instructions' => 'En kort sammanfattning av vad nummret innehåller.',
                'required' => true,
                'media_upload' => false,
                'tabs' => 'visual',
                'toolbar' => 'simple',
            ]),
            acf_image([
                'name' => 'cover',
                'label' => 'Omslag',
                'instructions' => 'Omslag för nummret.',
                'required' => true,
                'mime_types' => '.jpg, .jpeg, .png, .svg',
                'return_value' => 'object',
            ]),
        ],
    ]),
    acf_group([
        'name' => 'metadata',
        'label' => 'Metadata',
        'sub_fields' => [
            acf_number([
                'name' => 'number',
                'label' => 'Nummer',
                'instructions' => 'Nummer i följden.',
                'required' => true,
                'min' => 1,
            ]),
            acf_date_picker([
                'name' => 'release',
                'label' => 'Datum',
                'instructions' => 'Det datum nummret släpptes.',
                'required' => true,
                'display_format' => 'Y/m/d',
                'return_format' => 'Y/m/d',
            ]),
        ],
    ]),
    acf_group([
        'name' => 'content',
        'label' => 'Content',
        'sub_fields' => [
            acf_url([
                'name' => 'article',
                'label' => 'Artikel',
                'instructions' => 'Länk till nummret (pdf).',
                'required' => true,
            ]),
        ],
    ]),
];

$location = [
    [
        acf_location('post_type', 'magazine')
    ]
];

acf_field_group([
    'title' => 'magazine',
    'fields' => $fields,
    'style' => 'seamless',
    'location' => $location,
    'hide_on_screen' => [
        0 => 'the_content',
        1 => 'featured_image',
    ],
]);
