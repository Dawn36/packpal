<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Bids;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        $users = User::whereRoleIs($status)->get();
        return view('user/users_index', compact('users', 'status'));
    }
    public function verifyIndex()
    {
        $users = User::where('send_doc', 'yes')->where('verified', 'no')->get();
        return view('user/user_verify_index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/users_create');
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,deleted_at,NULL'],
            'password' => ['required',  Rules\Password::defaults()],
        ]);


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_no' => $request->phone_number,
            'street' => $request->street,
            'city' => $request->city,
            'country' => $request->country,
            'profile_picture' => $request->profile_picture,
            'company_name' => $request->company_name,
            'created_by' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'password' => Hash::make($request->password),

        ]);
        $user->attachRole($request->role_id);

        if ($request->hasFile('file')) {
            $id = $user['id'];

            $user = User::find($id);
            // $folderName = $userId;
            // $fileName = time();
            // $previousPic = $user->profile_picture;
            // $previousPicDest = "profile/" . $previousPic;
            // File::delete($previousPicDest);
            // $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            // $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
            $path = "profile/" . $id;
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $user['profile_picture'] = $id  . "/" . $filename;

            $user->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $orderObj = new Order();
        $supplierObj = new Supplier();
        $userData = User::find($userId);
        $rating = $orderObj->ratingCount($userId);
        $review = $orderObj->orderDataBitReview($bidId = '', $userId);
        $ratingSupplier = $supplierObj->supplierReviews($userId);
        $ratingSupplier = round($ratingSupplier[0]->rating);
        return view('user/user_supplier_show', compact('userData', 'rating', 'review', 'ratingSupplier'));
    }

    public function buyerShow(int $userId)
    {
        $userData = User::find($userId);
        $bids = Bids::with('categories')->with('subCategories')->where('status', 'active')->where('user_id', $userId)->get();
        return view('user/user_buyer_show', compact('userData', 'bids'));
    }
    public function documentShow(int $userId)
    {
        $userData = User::find($userId);
        $userDoc = DB::select(DB::raw("Select * from `user_document` where deleted_at IS NULL AND user_id='$userId'"));
        return view('user/user_verify_show', compact('userData', 'userDoc'));
    }
    public function verifySubmit(int $userId)
    {
        $userData = User::find($userId);

        $userData['verified'] = 'yes';

        $userData->save();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $userDoc = DB::select(DB::raw("Select * from `user_document` where deleted_at IS NULL AND user_id='$id'"));
        $categories=Categories::whereNull('deleted_at')->get();

        return view('user/settings', compact('user', 'userDoc','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::find($id);

        if ($request->hasFile('file')) {
            $previousPic = $user->profile_picture;
            $previousPicDest = "profile/" . $previousPic;
            $previousPic = $user->profile_picture;
            if ($previousPic != 'blank.png') {
                $previousPicDest = "profile/" . $previousPic;
                File::delete($previousPicDest);
            }
            // File::delete($previousPicDest);
            $path = "profile/" . $id;
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $user['profile_picture'] = $id  . "/" . $filename;
        }
        if ($request->password) {
            $user['password'] = $request->password;
        }

        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['contact_no'] = $request->phone_number;
        $user['street'] = $request->street;
        $user['city'] = $request->city;
        $user['country'] = $request->country;
        $user['company_name'] = $request->company_name;
        $user['updated_by'] = Auth::user()->id;
        $user['updated_at'] =  date("Y-m-d");


        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function verifyCreate()
    {
        return view('user/user_upload_doc');
    }
    public function verifyStore(Request $request)
    {
        $userId = Auth::user()->id;

        $userData = User::find($userId);
        $userData['send_doc'] = 'yes';
        $userData->save();

        $request->validate([
            'document' => ['required', 'max:5000'],
        ]);

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            //  print_r($image);
            for ($i = 0; $i < count($file); $i++) {
                # code...
                $file_name = time() . $file[$i]->getClientOriginalName();
                $size = $file[$i]->getSize();
                //  echo $image;
                //  exit(0);
                $destinationPath = base_path('public/uploads/user-document/' . $userId);
                $file[$i]->move($destinationPath, $file_name);
                $path = 'uploads/user-document/' . $userId . "/" . $file_name;

                $data = DB::table('user_document')->insert([
                    'user_id' => $userId,
                    'file_name' => $file[$i]->getClientOriginalName(),
                    'size' => $size,
                    'path' => $path,
                    'created_at' => date("Y-m-d h:i:s"),
                    'created_by' => $userId,
                ]);
            }

            return redirect()->back();
        }
    }
    public function subscriptionRequest()
    {
        $subscriptionRequest = DB::select(DB::raw("SELECT 
        u.`id` AS user_id,
        u.`first_name`,
        u.`last_name`,
        u.`email`,
        u.`phone_number`,
        u.`profile_picture`,
        uei.`package`,
        uei.`created_at`,
        GROUP_CONCAT(uei.`path`) AS path
      FROM
        `users` u 
        INNER JOIN `user_expiry_image` uei 
          ON u.`id` = uei.`user_id` 
      WHERE `status` = 'pending' 
      GROUP BY u.`id`"));
        return view('user/user_subscription_request',compact('subscriptionRequest'));
    }
    public function subscriptionAcceptReject($userId ,$month,$status)
    {
        if($status == 'accept')
        {
            $expiryDate = date('Y-m-d', strtotime($month));
            $userData = User::find($userId);
            $userData['expiry_date'] = $expiryDate;
            $userData->save();

            DB::table('user_expiry_image')
            ->where('user_id', $userId)
            ->where('status', 'pending')
            ->update([
                'status' => 'accept'
            ]);
        }
        else
        {
            DB::table('user_expiry_image')
            ->where('user_id', $userId)
            ->where('status', 'pending')
            ->update([
                'status' => 'reject'
            ]);
        }
        return redirect()->back();
       
    }
    public function changeRole(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        
        if(is_null($user->categories_id) && is_null($user->sub_categories_id))
        {
             toast('error','If you want to change to supplier please select category and sub caregory');
            // $request->session()->flash('error', 'If you want to change to supplier please select category and sub caregory');
            return redirect()->route('settings.create');
        }
        if($user->hasRole('buyer'))
        {
            DB::table('role_user')->where('user_id', $userId)->update(['role_id' => '2']);
            DB::table('users')->where('id', $userId)->update(['user_type' => '2']);
        return redirect()->route('dashboard');

        }
        if($user->hasRole('supplier'))
        {
            DB::table('role_user')->where('user_id', $userId)->update(['role_id' => '3']);
            DB::table('users')->where('id', $userId)->update(['user_type' => '3']);

            return redirect()->route('dashboard');


        }

    }
    
    
}
