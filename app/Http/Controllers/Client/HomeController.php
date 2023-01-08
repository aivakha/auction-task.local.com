<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Filters\LotFilter;
use App\Http\Requests\Lot\FilterRequest;
use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        // $lots = Lot::all();
        $categories = Category::all();

        $filter = app()->make(LotFilter::class, ['queryParams' => array_filter($data)]);

        // dd($filter);

        $lots = Lot::filter($filter)->paginate(9);

        return view('client.home', compact('lots', 'categories'));
    }
}
