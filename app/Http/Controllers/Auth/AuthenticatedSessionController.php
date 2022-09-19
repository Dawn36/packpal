<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function sendEmailAndRestPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);
        if ($validator->fails()) {
            
            $request->session()->flash('message', 'Email Does Not Exists');
            return redirect()->back();

        }
        else
        {
            
        }
        // $to_email = $customerEmail;
        // $from_email = 'dawngill08@gmail.com';
        // $subject = 'jkhk';

        // $cc = 'dawngill08@gmail.com';

        // Mail::send('mailtemplate/email_template', ['msg' => $data], function ($message) use ($to_email, $from_email, $subject, $cc) {
        //     $message->to($from_email)
        //         ->subject($subject)
        //         ->cc($cc);
        //     $message->from($to_email);
        // });


    }
}
