<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard/dashboard_admin');
        // if(Auth::user()->hasRole('admin'))
        // {
            
        // }
        // if(Auth::user()->hasRole('supplier'))
        // {
        //     return view('dashboard/dashboard_supplier');
        // } 
        // if(Auth::user()->hasRole('buyer'))
        // {
        //     return view('dashboard/dashboard_buyer');
        // } 
        
        
    }
}
