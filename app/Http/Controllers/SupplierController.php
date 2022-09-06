<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;
        $objSupplier = new Supplier();

        $supplier = $objSupplier->supplierListing($categoryId,   $subCategoryId);

        $categories = Categories::orderBy('category_name', 'asc')->get();

        return view('supplier/supplier_listing', compact('categories', 'supplier', 'categoryId', 'subCategoryId'));

    }
    public function supplierDetail(int $userId, int $catId)
    {
        $orderObj = new Order();
        $supplierObj = new Supplier();

        $user = User::where('id', $userId)->with('categories')->with('subCategories')->get();
        $userListing = User::where('categories_id', $catId)->whereNull('deleted_at')->get();
        $review = $orderObj->orderDataBitReview($bidId = '', $userId);
        $rating = $supplierObj->supplierReviews($userId);
        $rating = round($rating[0]->rating);
        return view('supplier/supplier_details', compact('user', 'userListing', 'review', 'rating'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
