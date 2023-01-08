<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class LotFilter extends AbstractFilter
{
    public const CATEGORIES = 'categories';


    protected function getCallbacks(): array
    {
        return [
            self::CATEGORIES => [$this, 'categories'],
        ];
    }

    public function categories(Builder $builder, $value)
    {
//        $builder->whereHas('sports', function ($subquery) {
//            $subquery->where('name', 'Basket-ball');
//        });

        $builder->whereHas('categories', function ($b) use ($value) {
            $b->whereIn('category_id', $value);
        });
    }



}
