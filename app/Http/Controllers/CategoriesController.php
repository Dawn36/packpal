<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Bids;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Categories::get();
        // $categories = DB::select(DB::raw("SELECT c.*,COUNT(sc.`category_id`) AS total_subcategory FROM `categories` c 
        //  LEFT JOIN `sub_categories` sc ON c.`id`=sc.`category_id`
        //  WHERE c.`deleted_at` IS NULL
        //  GROUP BY c.`id`"));
        $categories = DB::table('categories AS c')
            ->leftJoin('sub_categories AS sc', 'c.id', '=', 'sc.categories_id')
            ->select(array('c.*', DB::raw('COUNT(sc.`categories_id`) AS total_subcategory')))
            ->whereNull('c.deleted_at')
            ->groupBy('c.id')->get();

        return view('categories/categories_index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories/categories_create');
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
            'category_name' => ['required'],
            'file' => ['required'],

        ]);
        $data = Categories::create([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);


        if ($request->hasFile('file')) {
            $id = $data['id'];

            $categories = Categories::find($id);
            // $folderName = $userId;
            // $fileName = time();
            // $previousPic = $user->profile_picture;
            // $previousPicDest = "profile/" . $previousPic;
            // File::delete($previousPicDest);
            // $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            // $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
            $path = "category/" . $id;
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $categories['category_image'] = $id  . "/" . $filename;

            $categories->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $categories = Categories::find($id);
        $catId = $id;
        // $subCategories = SubCategories::find($id);
        // $subCategories = DB::select(DB::raw(" SELECT sc.*,COUNT(a.`sub_category_id`) AS total_ads FROM `sub_categories`sc LEFT JOIN `adds` a
        // ON sc.`id`=a.`sub_category_id` 
        // WHERE sc.`deleted_at` IS NULL AND sc.`category_id`='$id'
        // GROUP BY sc.`id`"));
        $subCategories = DB::table('sub_categories AS sc')
            ->leftJoin('bids AS b', 'sc.id', '=', 'b.sub_categories_id')
            ->select(array('sc.*', DB::raw('COUNT(b.`sub_categories_id`) AS total_bid')))
            ->whereNull('sc.deleted_at')
            ->whereNull('b.deleted_at')
            ->where('sc.categories_id', $id)
            ->groupBy('sc.id')->get();

        $bids = Bids::with('categories')->with('subCategories')->with('user')->where('categories_id', $catId)->get();;


        return view('categories/categories_show', compact('categories', 'subCategories', 'bids'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $categories = Categories::find($id);

        return view('categories/categories_edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'category_name' => ['required'],

        ]);
        $categories = Categories::find($id);

        if ($request->hasFile('file')) {
            $previousPic = $categories->category_image;
            $previousPicDest = "category/" . $previousPic;
            File::delete($previousPicDest);
            $path = "category/" . $id;
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $categories['category_image'] = $id  . "/" . $filename;
        }

        $categories['category_name'] = $request->category_name;
        $categories->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Categories::find($id);
        $data->delete();
        return redirect()->back();
    }
}
