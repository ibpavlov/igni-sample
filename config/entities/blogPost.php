<?php

return [
    'name' => 'Blog Post',
    'description' => 'Blog Post resource',
    'model' => App\Models\BlogPost::class,
    'controller' => App\Http\Controllers\Admin\BlogPostsController::class,
    'adminColumns' => ['title'],
    'actions' => ['edit', 'create', 'destroy'],
    'adminFormFields' => [
        'title' => [
            'type' => 'text',
            'label' => 'Title',
        ],
        'image' => [
            'type' => 'imageSingle',
            'label' => 'Image',
        ],
    ],
    'image_fields' => [
        'image' => [
            'thumbnails' => [
                'admin' => [
                    'width' => 150,
                    'height' => null,
                    'type' => 'resize',
                ],
                'normal' => [
                    'width' => 960,
                    'height' => null,
                    'type' => 'resize',
                ],
            ],
        ],
    ],
    'adminMenu' => [
        'blogPosts' => [
            'name' => 'Blog Post',
            'iconClass' => 'fa-star',
            'link' => 'blogpost.index',
        ],
    ],
];

