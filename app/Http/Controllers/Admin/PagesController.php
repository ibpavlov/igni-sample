<?php

namespace App\Http\Controllers\Admin;

use Despark\Cms\Http\Controllers\AdminController;
use Despark\Cms\Http\Requests\AdminFormRequest;
use App\Http\Requests\Admin\PagesUpdateRequest;

class PagesController extends AdminController
{
	/**
     * Store a newly created resource in storage.
     *
     * @param AdminFormRequest $request
     *
     * @return Response
     */
    public function store(AdminFormRequest $request)
    {
        $input = $request->all();

        if ($this->model instanceof Translatable) {
            $this->model->setActiveLocale($input['locale']);
        }

        if (! $input['slug']) {
            $input['slug'] = str_slug($input['title'], '-');
        }

        $record = $this->model->create($input);

        $this->notify([
            'type' => 'success',
            'title' => 'Successful create!',
            'description' => 'Page is created successfully!',
        ]);

        return redirect(route('pages.edit', ['id' => $record->id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PagesUpdateRequest $request
     * @param int              $id
     *
     * @return Response
     */
    public function update(PagesUpdateRequest $request, $id)
    {
        $input = $request->all();

        if ($this->model instanceof Translatable) {
            $this->model->setActiveLocale($input['locale']);
        }

        if (! $input['slug']) {
            $input['slug'] = str_slug($input['title'], '-');
        }

        $record = $this->model->findOrFail($id);

        $record->update($input);

        $this->notify([
            'type' => 'success',
            'title' => 'Successful update!',
            'description' => 'Page is updated successfully.',
        ]);

        return redirect()->back();
    }
}
