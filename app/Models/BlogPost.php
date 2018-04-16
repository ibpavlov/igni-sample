<?php

namespace App\Models;

use Despark\Cms\Models\AdminModel;
use Despark\Cms\Admin\Interfaces\UploadImageInterface;
use Despark\Cms\Admin\Traits\AdminImage;
use Despark\LaravelDbLocalization\Contracts\Translatable;
use Despark\LaravelDbLocalization\Traits\HasTranslation;


class BlogPost extends AdminModel implements UploadImageInterface, Translatable
{
    use AdminImage, HasTranslation;

    protected $table = 'blog_posts';

    protected $translatable = [];

    protected $fillable = ['title'];

    protected $rules = ['title' => 'required|max:50'];

    protected $rulesUpdate = [];

    public function getRulesUpdate()
    {
        return array_merge($this->rules, $this->rulesUpdate);
    }

    protected $identifier = 'blogPost';
}
