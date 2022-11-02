<?php

namespace App\Http\Controllers;

use App\Models\Bids;
use App\Models\Order;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\BidComment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $status)
    {
        $userId = Auth::user()->id;
        $active = '';
        $inactive = '';
        $pending = '';
        $denied = '';
        $title='';
        $headLine='';
        if ($status == 'active') {
            $title = "Active";
            $active = 'active';
            $color = 'success';
        $headLine='Here we have List of all Posted Bids.';
            
        }
        if ($status == 'inactive') {
            $title = "In-Active";
            $inactive = 'active';
            $color = 'danger';
            $headLine='Here we have list of all Bids that are In-active due to any possible reason(s). An In-active listing will be deleted after 30 days if not made active. Contact Support for Help.';
        }
        if ($status == 'pending') {
            $title = "Pending For Approvel";
            $pending = 'active';
            $color = 'warning';
            $headLine='Here we have list of all Bids Pending for Approval. You can Contact Support for Help.';

        }
        if ($status == 'reject') {
            $status='denied';
            $title = "Reject";
            $denied = 'active';
            $color = 'danger';
            $headLine='Here is the list of Bids Rejected. This is mainly due to any reason that are in violation or inacceptance of defined Terms and Policies of PackPal. Contact Support for further assistance.';

        }
        $bidsObj = new Bids();
        $bidSatatusCount = $bidsObj->bidStatusCount($userId);
        $bids = Bids::with('categories')->where('status', $status)->where('user_id', $userId)->get();
        return view('bids/bids_index', compact('bidSatatusCount', 'bids', 'active', 'inactive', 'pending', 'denied', 'title', 'color','headLine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::orderBy('category_name', 'asc')->get();
        return view('bids/bids_create', compact('categories'));
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
            'bids_name' => ['required'],
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
        $data = Bids::create([
            'bids_name' => $request->bids_name,
            'city_post_code' => $request->city_post_code,
            'location' => $request->location,
            'contact_no' => $request->contact_no,
            'description' => $request->description,
            'categories_id' => $request->category_id,
            'sub_categories_id' => $request->sub_category_id,
            'target_price' => $request->target_price,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        //        'contact_no' => $request->contact_no,



        if ($request->hasFile('bid_thumbnail')) {
            $id = $data['id'];

            $bid = Bids::find($id);

            // $folderName = $userId;
            // $fileName = time();
            // $previousPic = $user->profile_picture;
            // $previousPicDest = "profile/" . $previousPic;
            // File::delete($previousPicDest);
            // $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            // $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
            $path = "bid/" . $id;
            $file = $request->file('bid_thumbnail');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $bid['thumbnail'] = $id  . "/" . $filename;

            $bid->save();
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
            $path = "bid/" . $id;
            $file = $request->file('file');
            for ($i = 0; $i < count($file); $i++) {
                $size = $file[$i]->getSize();
                $filename = date('YmdHi') . $file[$i]->getClientOriginalName();
                $file[$i]->move(public_path($path), $filename);
                $paths = $id  . "/" . $filename;

                DB::table('bid_images')->insert([
                    'bids_id' => $id,
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
     * @param  \App\Models\Bids  $bids
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $bidOrder = '';
        $bidReview = '';
        $bidDetail = 'active';
        $bidObj = new Bids();
        $bids = Bids::with('categories')->with('subCategories')->with('user')->find($id);
        $bidsImage = $bidObj->getAddsImage($id);
        return view('bids/bids_show', compact('bids', 'bidsImage', 'bidDetail', 'bidOrder', 'bidReview'));
    }
    public function BidOrder(int $id)
    {
        $bidDetail = '';
        $bidReview = '';
        $bidOrder = 'active';
        $bidObj = new Bids();
        $bids = Bids::with('categories')->with('subCategories')->find($id);
        $objOrder = new Order();
        $order = $objOrder->orderDataBit($id);
        return view('bids/bids_show', compact('order', 'bids', 'bidOrder', 'bidDetail', 'bidReview'));
    }
    public function BidReview(int $id)
    {
        $bidDetail = '';
        $bidReview = 'active';
        $bidOrder = '';
        $bidObj = new Bids();
        $bids = Bids::with('categories')->with('subCategories')->find($id);
        $objOrder = new Order();
        $review = $objOrder->orderDataBitReview($id);
        return view('bids/bids_show', compact('review', 'bids', 'bidOrder', 'bidDetail', 'bidReview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bids  $bids
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $bidObj = new Bids();
        $bids = Bids::find($id);
        $bidsImage = $bidObj->getAddsImage($id);
        for ($i = 0; $i < count($bidsImage); $i++) {
            $bidsImage[$i]->path = asset('bid/' . $bidsImage[$i]->path);
        }
        $bidsImage = json_encode($bidsImage);

        $categories = Categories::get();
        return view('bids/bids_edit', compact('categories', 'bids', 'bidsImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bids  $bids
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'bids_name' => ['required'],
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
        $bids = Bids::find($id);
        $bids['bids_name'] = $request->bids_name;
        $bids['status'] = $status;
        $bids['contact_no'] = $request->contact_no;
        $bids['city_post_code'] = $request->city_post_code;
        $bids['target_price'] = $request->target_price;
        $bids['description'] = $request->description;
        $bids['location'] = $request->location;
        $bids['categories_id'] = $request->category_id;
        $bids['sub_categories_id'] = $request->sub_category_id;
        $bids['updated_by'] = Auth::user()->id;
        $bids['updated_at'] = date("Y-m-d");
        $bids->save();


        if ($request->hasFile('bid_thumbnail')) {
            $folderName = $id;
            $fileName = time();
            $previousPic = $bids->thumbnail;
            $previousPicDest = "bid/" . $previousPic;
            File::delete($previousPicDest);


            $path = "bid/" . $id;
            $file = $request->file('bid_thumbnail');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $bids['thumbnail'] = $id  . "/" . $filename;

            $bids->save();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bids  $bids
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Bids::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function subCategories(Request $request)
    {
        $categoryId = $request->categoryId;
        if (!$categoryId) {
            return 0;
        }
        return  SubCategories::where('categories_id', $categoryId)->orderBy('sub_category_name', 'asc')->get();
    }
    public function bidDeleteImage()
    {
        $addsImageId = $_REQUEST['addsImageId'];
        DB::table('bid_images')->where('id', $addsImageId)->update(['deleted_at' => now()]);
    }
    public function bidUploadImage(Request $request)
    {
        $bidId =  $request->bidId;
        if ($request->hasFile('file')) {
            $id = $bidId;

            // $folderName = $userId;
            // $fileName = time();
            // $previousPic = $user->profile_picture;
            // $previousPicDest = "profile/" . $previousPic;
            // File::delete($previousPicDest);
            // $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            // $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
            $path = "bid/" . $id;
            $file = $request->file('file');
            for ($i = 0; $i < count($file); $i++) {
                $size = $file[$i]->getSize();
                $filename = date('YmdHi') . $file[$i]->getClientOriginalName();
                $file[$i]->move(public_path($path), $filename);
                $paths = $id  . "/" . $filename;

                DB::table('bid_images')->insert([
                    'bids_id' => $id,
                    'user_id' => Auth::user()->id,
                    'file_name' => $filename,
                    'path' => $paths,
                    'size' => $size,
                ]);
            }
        }
    }
    public function bidPending()
    {
        $bids = Bids::with('categories')->with('user')->where('status', 'pending')->get();
        return view('bids/bids_pending', compact('bids'));
    }
    public function bidApproved()
    {
        $bids = Bids::with('categories')->with('user')->where('status', 'active')->get();
        return view('bids/bids_approved', compact('bids'));
    }
    public function bidAccept(int $id)
    {
        $bids = Bids::find($id);
        $bids['status'] = 'active';
        $bids->save();
        return redirect()->back();
    }
    public function bidComment(Request $request)
    {
        $bidId = $request->bidId;
        $comment = BidComment::with('user')->where('bids_id', $bidId)->get();
        return view('bids/bids_comment', compact('bidId', 'comment'));
    }
    public function bidCommentSubmit(Request $request, int $bidId)
    {
        $request->validate([
            'comment' => ['required'],
        ]);

        $data = BidComment::create([
            'comment' => $request->comment,
            'bids_id' => $bidId,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => Auth::user()->id,
        ]);

        $bids = Bids::find($bidId);
        $bids['status'] = 'denied';
        $bids->save();

        return redirect()->back();
    }
}
