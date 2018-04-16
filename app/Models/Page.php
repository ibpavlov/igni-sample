<?php

namespace App\Models;

use Despark\Cms\Models\AdminModel;
use Despark\Cms\Admin\Interfaces\UploadImageInterface;
use Despark\Cms\Admin\Traits\AdminImage;

class Page extends AdminModel implements UploadImageInterface
{
    use AdminImage;

    protected $table = 'pages';

    protected $fillable = [
        'title',
        'meta_description',
        'slug',
        'content',
        'is_published',
    ];

    protected $rules = [
        'title' => 'required|max:100|unique:pages,title',
        'meta_description' => 'max:255',
        'slug' => 'max:200|unique:pages,slug',
        'content' => 'required',
        'meta_image' => 'image|max:15000',
    ];

    protected $rulesUpdate = [
        'title' => 'required|max:100|unique:pages,title,{id},id',
        'slug' => 'max:200|unique:pages,slug,{id},id',
        'meta_image' => 'image|max:15000',
    ];

    protected $identifier = 'pages';
}
