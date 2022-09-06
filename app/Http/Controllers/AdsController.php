<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads=Ads::get();
        return view('ads/ads_index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads/ads_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'file' => ['required', 'max:5000'],
            'ads_name' => ['required'],
            'status' => ['required'],
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            //  print_r($image);
                # code...
                $file_name = time() . $file->getClientOriginalName();
                $size = $file->getSize();
                //  echo $image;
                //  exit(0);
                $destinationPath = base_path('public/uploads/user-ads/' . $userId);
                $file->move($destinationPath, $file_name);
                $path = 'uploads/user-ads/' . $userId . "/" . $file_name;

        }
        $user = Ads::create([
            'ads_name' => $request->ads_name,
            'status' => $request->status,
            'file_name' => $file->getClientOriginalName(),
            'path' => $path,
            'size' => $size,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => $userId,

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $ads = Ads::find($id);

        return view('ads/ads_edit', compact('ads'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'ads_name' => ['required'],
            'status' => ['required'],

        ]);
        $ads = Ads::find($id);

        if ($request->hasFile('file')) {
            $previousPicDest = $ads->path;

           // $previousPicDest = "category/" . $previousPic;
            File::delete($previousPicDest);
            $path = base_path('public/uploads/user-ads/' . $userId);
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move($path, $filename);
            $ads['path'] = 'uploads/user-ads/' . $userId . "/" . $filename;
        }
        

        $ads['ads_name'] = $request->ads_name;
        $ads['status'] = $request->status;
        $ads['updated_at'] = Date("Y-m-d h:i:s");
        $ads->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Ads::find($id);
        $previousPicDest = $data->path;
        File::delete($previousPicDest);
        $data->delete();
        return redirect()->back();
    }
}
