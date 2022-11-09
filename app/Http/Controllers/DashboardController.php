<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\User;
use App\Models\Bids;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        
        if(Auth::user()->hasRole('admin'))
        {
            $date=Date("Y-m-d");
            $category=Categories::count();
            $subcategory=SubCategories::count();
            $buyer=User::where('user_type','3')->count();
            $supplier=User::where('user_type','2')->count();
            $verified=User::where('verified','yes')->count();
            $subscribe=User::where('expiry_date','>',$date)->where('user_type','!=','1')->count();
            $bids=Bids::where('status','active')->where('show_bid','yes')->count();
            return view('dashboard/dashboard_admin',compact('category','subcategory','buyer','supplier','verified','subscribe','bids'));
        }
        if(Auth::user()->hasRole('supplier'))
        {
            $userId = Auth::user()->id;
            $totalBussiness=Order::where('s_user_id',$userId)->where('status','complete')->sum('offer_price');
            $reject=Order::where('s_user_id',$userId)->where('status','reject')->count();
            $inProcess=Order::where('s_user_id',$userId)->where('status','inprocess')->count();
            $offer=Order::where('s_user_id',$userId)->where('status','offer')->count();
            $reviewsGiven=DB::table('reviews')->where('to_user_id',$userId)->count();
            return view('dashboard/dashboard_supplier',compact('totalBussiness','reviewsGiven','reject','inProcess','offer'));
        } 
        if(Auth::user()->hasRole('buyer'))
        {
            $userId = Auth::user()->id;
            $approved=Bids::where('status','active')->where('show_bid','yes')->where('user_id',$userId)->count();
            $activeRequests=Bids::where('status','pending')->where('user_id',$userId)->count();
            $denied=Bids::where('status','denied')->where('user_id',$userId)->count();
            $reviewsPost=DB::table('reviews')->where('from_user_id',$userId)->count();
            $totalBussiness=Order::where('b_user_id',$userId)->where('status','complete')->sum('offer_price');
            $mainCategory=DB::select(DB::raw("SELECT COUNT(DISTINCT(b.`categories_id`)) AS main_category FROM `bids` b INNER JOIN `categories` c ON b.`categories_id`=c.`id` WHERE b.`user_id`='$userId'"));  
            return view('dashboard/dashboard_buyer',compact('activeRequests','approved','denied','reviewsPost','totalBussiness','mainCategory'));
        } 
        
        
    }
}
