<?php

namespace App\Services;

use App\DTO\LotDto;
use App\Models\Lot;

class LotService
{
    public function store(LotDto $dto): void
    {
        $lot = Lot::add([
            'title' => $dto->title,
            'description' => $dto->description
        ]);

        $lot->setCategories($dto->categories);
    }

    public function update($lot, LotDto $dto): void
    {
        $lot->edit([
            'title' => $dto->title,
            'description' => $dto->description
        ]);

        $lot->updateCategories($dto->categories);
    }
}
