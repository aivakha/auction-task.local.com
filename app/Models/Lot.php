<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = ['title', 'description'];

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'lot_category');
    }

    public static function add($fields)
    {
        $lot = new static;
        $lot->fill($fields);
        $lot->save();

        return $lot;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function setCategories($ids)
    {
        if ($ids == null) {
            return;
        }

        $this->categories()->sync($ids);
    }

    public function updateCategories($ids)
    {
        if ($ids == null) {
            return $this->categories()->detach();
        }

        $this->categories()->sync($ids);
    }
}
