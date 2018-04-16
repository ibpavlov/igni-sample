<?php

namespace App\Http\Requests\Admin;

use Despark\Cms\Http\Requests\AdminFormRequest;

class PagesUpdateRequest extends AdminFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = $this->model->getRulesUpdate();

        $rules['title'] = str_replace('{id}', $this->route()->parameter('page'), $rules['title']);
        $rules['slug'] = str_replace('{id}', $this->route()->parameter('page'), $rules['slug']);

        return $rules;
    }
}
