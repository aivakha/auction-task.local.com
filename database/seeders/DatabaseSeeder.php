<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Lot;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(10)->create();

        Lot::factory(30)->create()
            ->each(function($lot) use ($categories) {
                $lot->categories()->attach($categories->random(2));
        });
    }
}
