<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;
use App\Models\ProductComment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $status)
    {
        $active = '';
        $inactive = '';
        $pending = '';
        $denied = '';
        $userId = Auth::user()->id;
        if ($status == 'active') {
            $title = "Active";
            $active = 'active';
            $color = 'success';
        }
        if ($status == 'inactive') {
            $title = "In-active";
            $inactive = 'active';
            $color = 'danger';
        }
        if ($status == 'pending') {
            $title = "Pending for approvel";
            $pending = 'active';
            $color = 'warning';
        }
        if ($status == 'denied') {
            $title = "Denied";
            $denied = 'active';
            $color = 'danger';
        }
        $productObj = new Product();
        $productSatatusCount = $productObj->productStatusCount($userId);
        $product = Product::with('categories')->where('status', $status)->where('user_id', $userId)->get();
        return view('product/product_index', compact('productSatatusCount', 'product', 'active', 'inactive', 'pending', 'denied', 'title', 'color'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::orderBy('category_name', 'asc')->get();
        return view('product/product_create', compact('categories'));
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
            'product_name' => ['required'],
            'target_price' => ['required'],
            'city_post_code' => ['required'],
            'location' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'],

        ]);
        // $validatedData = $request->validate([
        //     'bid_thumbnail' => 'png,jpg,jpeg|max:2048',
        //     'file' => 'png,jpg,jpeg|max:2048'

        // ]);
        $data = Product::create([
            'product_name' => $request->product_name,
            'city_post_code' => $request->city_post_code,
            'contact_no' => $request->contact_no,
            'location' => $request->location,
            'description' => $request->description,
            'categories_id' => $request->category_id,
            'sub_categories_id' => $request->sub_category_id,
            'target_price' => $request->target_price,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        //        'contact_no' => $request->contact_no,



        if ($request->hasFile('product_thumbnail')) {
            $id = $data['id'];

            $product = Product::find($id);

            // $folderName = $userId;
            // $fileName = time();
            // $previousPic = $user->profile_picture;
            // $previousPicDest = "profile/" . $previousPic;
            // File::delete($previousPicDest);
            // $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            // $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
            $path = "Products/" . $id;
            $file = $request->file('product_thumbnail');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $product['thumbnail'] = $id  . "/" . $filename;

            $product->save();
        }
        if ($request->hasFile('file')) {
            $id = $data['id'];

            // $folderName = $userId;
            // $fileName = time();
            // $previousPic = $user->profile_picture;
            // $previousPicDest = "profile/" . $previousPic;
            // File::delete($previousPicDest);
            // $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            // $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
            $path = "Products/" . $id;
            $file = $request->file('file');
            for ($i = 0; $i < count($file); $i++) {
                $size = $file[$i]->getSize();
                $filename = date('YmdHi') . $file[$i]->getClientOriginalName();
                $file[$i]->move(public_path($path), $filename);
                $paths = $id  . "/" . $filename;

                DB::table('product_images')->insert([
                    'products_id' => $id,
                    'user_id' => Auth::user()->id,
                    'file_name' => $filename,
                    'path' => $paths,
                    'size' => $size,
                ]);
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $productObj = new Product();
        $product = Product::with('categories')->with('subCategories')->find($id);
        $productImage = $productObj->getAddsImage($id);
        return view('product/product_show', compact('product', 'productImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $productObj = new Product();
        $product = Product::find($id);
        $productImage = $productObj->getAddsImage($id);
        for ($i = 0; $i < count($productImage); $i++) {
            $productImage[$i]->path = asset('products/' . $productImage[$i]->path);
        }
        $productImage = json_encode($productImage);

        $categories = Categories::get();
        return view('product/product_edit', compact('categories', 'product', 'productImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'product_name' => ['required'],
            'target_price' => ['required'],
            'city_post_code' => ['required'],
            'location' => ['required'],
            'description' => ['required'],
            'contact_no' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'],

        ]);
        if ($request->status == 'active') {
            $status = 'pending';
        } else {
            $status =  $request->status;
        }
        $product = Product::find($id);
        $product['product_name'] = $request->product_name;
        $product['status'] = $status;
        $product['contact_no'] = $request->contact_no;
        $product['city_post_code'] = $request->city_post_code;
        $product['target_price'] = $request->target_price;
        $product['description'] = $request->description;
        $product['location'] = $request->location;
        $product['categories_id'] = $request->category_id;
        $product['sub_categories_id'] = $request->sub_category_id;
        $product['updated_by'] = Auth::user()->id;
        $product['updated_at'] = date("Y-m-d");
        $product->save();


        if ($request->hasFile('product_thumbnail')) {
            $folderName = $id;
            $fileName = time();
            $previousPic = $product->thumbnail;
            $previousPicDest = "products/" . $previousPic;
            File::delete($previousPicDest);


            $path = "products/" . $id;
            $file = $request->file('product_thumbnail');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $product['thumbnail'] = $id  . "/" . $filename;

            $product->save();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function productDeleteImage()
    {
        $addsImageId = $_REQUEST['addsImageId'];
        DB::table('product_images')->where('id', $addsImageId)->update(['deleted_at' => now()]);
    }
    public function productUploadImage(Request $request)
    {
        $productId =  $request->productId;
        if ($request->hasFile('file')) {
            $id = $productId;

            // $folderName = $userId;
            // $fileName = time();
            // $previousPic = $user->profile_picture;
            // $previousPicDest = "profile/" . $previousPic;
            // File::delete($previousPicDest);
            // $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            // $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
            $path = "products/" . $id;
            $file = $request->file('file');
            for ($i = 0; $i < count($file); $i++) {
                $size = $file[$i]->getSize();
                $filename = date('YmdHi') . $file[$i]->getClientOriginalName();
                $file[$i]->move(public_path($path), $filename);
                $paths = $id  . "/" . $filename;

                DB::table('product_images')->insert([
                    'products_id' => $id,
                    'user_id' => Auth::user()->id,
                    'file_name' => $filename,
                    'path' => $paths,
                    'size' => $size,
                ]);
            }
        }
    }
    public function productPending()
    {
        $product = Product::with('categories')->with('user')->where('status', 'pending')->get();
        return view('product/product_pending', compact('product'));
    }
    public function productApproved()
    {
        $product = Product::with('categories')->with('user')->where('status', 'active')->get();
        return view('product/product_approved', compact('product'));
    }
    public function productAccept(int $id)
    {
        $products = Product::find($id);
        $products['status'] = 'active';
        $products->save();
        return redirect()->back();
    }
    public function productComment(Request $request)
    {
        $productId = $request->productId;
        $comment = ProductComment::with('user')->where('products_id', $productId)->get();
        return view('product/product_comment', compact('productId', 'comment'));
    }
    public function productCommentSubmit(Request $request, int $productId)
    {
        $request->validate([
            'comment' => ['required'],
        ]);

        $data = ProductComment::create([
            'comment' => $request->comment,
            'products_id' => $productId,
            'user_id' => Auth::user()->id,
            'created_by' => Auth::user()->id,
        ]);

        $product = Product::find($productId);
        $product['status'] = 'denied';
        $product->save();

        return redirect()->back();
    }
}
