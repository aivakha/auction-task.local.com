<?php

namespace App\Http\Controllers\Admin;

use App\DTO\LotDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lot\StoreRequest;
use App\Http\Requests\Lot\UpdateRequest;
use App\Models\Category;
use App\Models\Lot;
use App\Services\LotService;

class LotController extends Controller
{

    public function __construct(
        protected LotService $service
    )
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lots = Lot::all();

        return view('admin.lots.index', compact('lots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.lots.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $dto = new LotDto(
            title: $request->validated('title'),
            description: $request->validated('description'),
            categories: $request->validated('category_id')
        );

        $this->service->store($dto);

        return redirect()->route('lots.index')->with('success', 'Successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lot  $lot
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Lot $lot)
    {
        return view('admin.lots.show', compact('lot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function edit(Lot $lot)
    {
        $categories = Category::pluck('title', 'id')->all();
        $selectedCategories = $lot->categories->pluck('id')->all();

        return view('admin.lots.edit', compact('lot', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lot  $lot
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Lot $lot)
    {
        $dto = new LotDto(
            title: $request->validated('title'),
            description: $request->validated('description'),
            categories: $request->validated('category_id')
        );

        $this->service->update($lot, $dto);

        return redirect()->route('lots.index')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lot $lot)
    {
        $lot->delete();

        return redirect()->back()->with('success','Deleted successfully!');
    }
}
