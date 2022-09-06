<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\SubCategories;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categoryId = $request->category_id;
        return view('categories/subcategories/sub_categories_create', compact('categoryId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required'],
            'sub_category_name' => ['required'],

        ]);
        $data = SubCategories::create([
            'categories_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategories $subCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $subCategories = SubCategories::find($id);

        return view('categories/subcategories/sub_categories_edit', compact('subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {

        $request->validate([
            'sub_category_name' => ['required'],

        ]);
        $subCategories = SubCategories::find($id);

        $subCategories['sub_category_name'] = $request->sub_category_name;
        $subCategories->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = SubCategories::find($id);
        $data->delete();
        return redirect()->back();
    }
}
