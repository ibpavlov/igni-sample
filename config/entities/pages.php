<?php

return [
    'name' => 'Page',
    'description' => 'Page resource',
    'model' => App\Models\Page::class,
    'controller' => App\Http\Controllers\Admin\PagesController::class,
    'adminColumns' => [
        'title',
        'is published' => 'is_published',
    ],
    'actions' => ['create', 'edit', 'destroy'],
    'adminFormFields' => [
        'title' => [
            'type' => 'text',
            'label' => 'Title',
        ],
        'is_published' => [
            'type' => 'checkbox',
            'label' => 'Is Published',
        ],
        'slug' => [
            'type' => 'text',
            'label' => 'Slug',
        ],
        'meta_description' => [
            'type' => 'text',
            'label' => 'Meta Description',
        ],
        'meta_image' => [
            'type' => 'imageSingle',
            'label' => 'Image',
        ],
        'content' => [
            'type' => 'wysiwyg',
            'label' => 'Content',
        ],
    ],
    'image_fields' => [
        'meta_image' => [
            'thumbnails' => [
                'admin' => [
                    'width' => 150,
                    'height' => null,
                    'type' => 'resize',
                ],
                'normal' => [
                    'width' => 1200,
                    'height' => 630,
                    'type' => 'resize',
                ],
            ],
        ],
    ],
    'adminMenu' => [
        'pages' => [
            'name' => 'Pages',
            'iconClass' => 'fa-file-code-o',
            'link' => 'pages.index',
        ],
    ],
];
