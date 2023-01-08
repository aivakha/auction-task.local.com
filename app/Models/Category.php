<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function lots(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Lot::class, 'lot_category');
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
}
