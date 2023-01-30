<?php

namespace App\DTO;

class LotDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly ?array $categories,
    )
    {

    }
}
