<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\Ads;
use App\Models\Categories;
use App\Models\Bids;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\User;

class WebsiteController extends Controller
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
        $objWebSite= new Website();
        $adsTop=Ads::where('status','top')->get();
        $adsMiddle=Ads::where('status','middle')->get();
        $adslast=Ads::where('status','last')->get();
        $bidListing=$objWebSite->bidListing($categoryId,   $subCategoryId);
        $catAndSubCat=$objWebSite->getCatAndSubCat();
        $objSupplier = new Supplier();
        $supplier = $objSupplier->supplierListing($categoryId,   $subCategoryId);
        $categories = Categories::get();
        return view('web-site/home',compact('supplier','bidListing','adsTop','adsMiddle','adslast','catAndSubCat','categories'));
    }
    public function bidDetail(int $bidId)
    {
        
        $objWebSite= new Website();
        $bidObj = new Bids();
        $bidDetail=$objWebSite->bidDetails($bidId);
        $bidsImage = $bidObj->getAddsImage($bidId);
        $categoryId = $bidDetail[0]->cat_id;
        $bidListing=$objWebSite->bidListing($categoryId);
        $categories = Categories::get();

        return view('web-site/bid_detail',compact('bidDetail','bidsImage','bidListing','categories'));
    }
    // public function bidListinga(Request $request)
    // {
    //     $objWebSite= new Website();
    //     $categoryId= $request->catId;
    //     $subCategoryId= $request->subCat;

    //     $search=$request->search;
    //     $orderBy = $request->newold;
    //     $bidListing=$objWebSite->bidListing($categoryId,   $subCategoryId, $search,$orderBy);

    //     $categories = Categories::get();

    //     return view('web-site/bid_listing',compact('bidListing','orderBy','categories','categoryId','subCategoryId'));
    // }
    public function bidListing(Request $request)
    {
        $objWebSite= new Website();
        $categoryId= $request->category_id;
        $subCategoryId= $request->sub_category_id;

        $search=$request->search;
        $orderBy = $request->newold;
        $bidListing=$objWebSite->bidListing($categoryId,   $subCategoryId, $search,$orderBy);

        $categories = Categories::get();

        return view('web-site/bid_listing',compact('bidListing','orderBy','categories','categoryId','subCategoryId'));
    }
    public function searchHome(Request $request)
    {
        $productOrSupplier=$request->product_supplier;
        if($productOrSupplier == 'product')
        {
            return   $this->bidListing($request);
        }
        else
        {
            return $this->supplierListing($request);
        }
    }
    public function supplierListing(Request $request)
    {
        $categoryId= $request->category_id;
        $subCategoryId= $request->sub_category_id;
        $search=$request->search;
        $orderBy = $request->newold;
        $objSupplier = new Supplier();
        $supplier = $objSupplier->supplierListing($categoryId,   $subCategoryId, $search, $orderBy);
        $categories = Categories::get();
        return view('web-site/supplier_listing',compact('supplier','orderBy','categories','categoryId','subCategoryId'));
    }

    public function subscribeModal(Request $request)
    {
        $month=$request->month;
        $userId = Auth::user()->id;
        $dataUser=User::find($userId);
        $dataUserExpiry=DB::table('user_expiry_image')->where('user_id',$userId)->where('status','pending')->orderBy('id','DESC')->limit('1')->get();
        
        // $dataUserExpiry[0]->package
        if(!Auth::user()->hasRole('supplier'))
        {
            return '<div class="alert alert-danger" role="alert">
            Only supplier can subscribe Or change your self from dashboard to supplier
          </div>';
        }
        if(Date("Y-m-d") < Date("Y-m-d",strtotime($dataUser->expiry_date)) )
        {
            $date=Date("Y-m-d",strtotime($dataUser->expiry_date));
            return '<div class="alert alert-danger" role="alert">
            Your current package is not expiry it will expiry on '.$date.' then you can select new package
          </div>';
        }
        if(count($dataUserExpiry) > 0)
        {
            return '<div class="alert alert-danger" role="alert">
            Thank you for uploading payment slip of package.<br>
            You have selected '.$dataUserExpiry[0]->package.' package admin will take 2 or 3 working days in process 
          </div>';
        }
        
        return view('web-site/package_modal',compact('month'));

    }
    public function subscriptionRequestStore(Request $request)
    {
        $userId = Auth::user()->id;

        // $userData = User::find($userId);
        // $userData['send_doc'] = 'yes';
        // $userData->save();

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
                $destinationPath = base_path('public/uploads/user-subscription-document/' . $userId);
                $file[$i]->move($destinationPath, $file_name);
                $path = 'uploads/user-subscription-document/' . $userId . "/" . $file_name;

                $data = DB::table('user_expiry_image')->insert([
                    'user_id' => $userId,
                    'package' => $request->pak_month,
                    'file_name' => $file[$i]->getClientOriginalName(),
                    'size' => $size,
                    'path' => $path,
                    'status' => 'pending',
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $userId,
                ]);
            }

            return redirect()->back();
        }
    }
    public function bidNow(Request $request)
    {
        $userIdAuth = Auth::user()->id;
        $bidId=$request->bidId;
        $userId=$request->userId;
        $catId=$request->catId;
        $subCatId=$request->subCatId;
        if (Order::where('s_user_id', $userIdAuth)->where('bids_id', $bidId)->where('status','offer')->orWhere('status','inprocess')->exists()) {
            $orderData=Order::where('s_user_id', $userIdAuth)->where('bids_id', $bidId)->where('status','offer')->orWhere('status','inprocess')->get();
            return view('web-site/bid_now_message',compact('orderData'));
         }
         if($userIdAuth == $userId)
         {
            return '<div class="alert alert-danger" role="alert">
            You can not make offer on your bid
          </div>';
         }
         if(!Auth::user()->hasRole('supplier'))
         {
            return '<div class="alert alert-danger" role="alert">
            You are not supplier only supplier can bid change your self to supplier from dashboard
          </div>';
         }
         else
         {
             return view('web-site/bid_now',compact('bidId','userId','catId','subCatId'));
         }
    }
    public function bidNowStore(Request $request)
    {
        $userId=Auth::user()->id;
        $request->validate([
            'bid_id' => ['required'],
            'user_id' => ['required'],
            'cat_id' => ['required'],
            'sub_cat_id' => ['required'],
            'offer' => ['required'],
        ]);
        Order::create([
            's_user_id' =>  $userId,
            'b_user_id' => $request->user_id,
            'bids_id' => $request->bid_id,
            'categories_id' => $request->cat_id,
            'sub_categories_id' =>$request->sub_cat_id,
            'offer_price' => $request->offer,
            'created_by' => Auth::user()->id,
            'created_at' => Date("Y-m-d"),
        ]);
        return redirect()->back();

    }
    public function subscribePage()
    {
        $categories = Categories::get();

        return view('web-site/subscribe_page',compact('categories'));

    }
    public function about()
    {
        $categories = Categories::get();

        return view('web-site/about',compact('categories')); 
    }
    public function feedBack()
    {
        $categories = Categories::get();

        return view('web-site/feed_back',compact('categories')); 
    }
    public function feedBackSubmit(Request $request)
    {
        dd($request);
    }
    public function categoryListing()
    {
        $categories = Categories::get();
        $objWebSite= new Website();
        $catAndSubCat=$objWebSite->getCatAndSubCat();
        return view('web-site/category_listing',compact('categories','catAndSubCat')); 
    }
}
