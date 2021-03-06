<?php

return [
    'projectName' => 'IgniCMS',
    'defaultFormView' => 'ignicms::admin.formElements.defaultForm',
    'paginateLimit' => 15,
    // For best performance the image must be with width 234px
    'logo' => 'images/logo.png',
    'auth' => [
        'admin' => \Despark\Cms\Http\Middleware\AdminAuth::class,
    ],
    'igniTablesPrefix' => env('IGNI_TABLES_PREFIX', null),
    'paths' => [
        'model' => app_path('Models'),
        'request' => app_path('Http/Requests/Admin'),
        'controller' => app_path('Http/Controllers/Admin'),
        'migration' => base_path('database/migrations'),
        'routes' => base_path('routes'),
        // Where your resource files are kept.
        'entities' => config_path('entities'),
    ],
    'files' => [
        // No leading slash
        'temporary_directory' => 'temp_uploads',
    ],
    'images' => [
        // Retina factor. User null or false if you don't want retina images to be generated.
        'retina_factor' => 2,
        'max_upload_size' => 15000,
        'admin_thumb_width' => 200,
        'admin_thumb_height' => 200,
        'admin_thumb_type' => 'fit',
        'disable_alt_title_fields' => false,
        'require_alt_title_fields' => true,
        'model' => \Despark\Cms\Models\Image::class,
    ],
    'languages' => [
        // Add languages that you will use in your app.
        [
            'locale' => 'en',
            'name' => 'English',
        ],
    ],
    'admin_assets' => [
        'js' => [
            'js/admin.js',
        ],
        'css' => [
            //'css/styles.css',
            '/css/admin.css',
        ],
    ],
    'user_export_queue' => env('IGNI_USER_EXPORT_QUEUE', 'user-export'),
];
