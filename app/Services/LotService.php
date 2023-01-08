<?php

namespace App\Services;

use App\Models\Lot;

class LotService
{
    public function handleCreate($request): void
    {
        $data = $request->validated();

        $lot = Lot::add($data);
        $lot->setCategories($request->input('category_id'));
    }

    public function handleUpdate($request, $lot): void
    {
        $data = $request->validated();
        $lot->edit($data);
        $lot->updateCategories($request->input('category_id'));
    }
}
