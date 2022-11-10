<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Categories;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories=Categories::whereNull('deleted_at')->get();
        return view('auth.register',compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users', 'unique:users,deleted_at,NULL'],
            'password' => ['required'],
            'role_id' => ['required'],
        ]);
        $latLong = getLatitudeLongitude($request->autocomplete);
        $user = User::create([
            'company_name' => $request->company_name,
            'primary_business' => $request->primary_business,
            'specify' => $request->specify,
            'establishment_year' => $request->establishment_year,
            'annual_sales' => $request->annual_sales,
            'certifications' => $request->certifications,
            'seller_of' => $request->seller_of,
            'categories_id' => $request->category,
            'sub_categories_id' => $request->sub_category,
            'description' => $request->description,
            'buyer_of' => $request->buyer_of,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'designation' => $request->designation,
            'department' => $request->department,
            'address' => $request->autocomplete,
            'password_show' => $request->password,
            'latitude ' => $latLong['lat'],
            'longitude' => $latLong['long'],
            'country' => $request->country,
            'city' => $request->city,
            'zip_postal_code' => $request->zip_postal_code,
            'landline_no' => $request->landline_no,
            'user_type'=>$request->role_id,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'expiry_date' => Date("Y-m-d H:i:s",strtotime('+6 month')),
            'password' => Hash::make($request->password),

        ]);
        $user->attachRole($request->role_id);

        event(new Registered($user));

        Auth::login($user);

        $toEmail=$request->email;
        $subject = 'Welcome';
        $fileName='register_template';
        sendEmail($toEmail,$subject,$fileName);


        return redirect(RouteServiceProvider::HOME);
    }
}
