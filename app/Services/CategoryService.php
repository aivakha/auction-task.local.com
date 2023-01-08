<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function handleCreate($request): void
    {
        $data = $request->validated();

        Category::add($data);
    }

    public function handleUpdate($request, $category): void
    {
        $data = $request->validated();
        $category->edit($data);
    }
}
