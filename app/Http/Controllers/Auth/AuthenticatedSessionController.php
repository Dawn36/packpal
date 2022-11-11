<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|exists:users',
        // ]);
        // if ($validator->fails()) {
        //     toast('error','Email Does Not Exists');
            
        //     //$request->session()->flash('message', 'Email Does Not Exists');
        //     return redirect()->back();

        // }
        // else
        // {
            toast('success','YOUR PASSWORD HAS BEEN RESET. KINDLY CHECK YOUR EMAIL AND SIGN IN AGAIN');

            // $userData=User::where('email', $request->email)->get();
            // $userData=User::find($userData[0]->id);
            $toEmail = $request->email;
              $from_email = env('MAIL_FROM_ADDRESS');
              $subject = 'REQUEST FOR PASSWORD RESET';
              $cc = env('CCEMAIL');
              $newPassword=$this->randomPassword();
         
            //   $userData->fill([
            //       'password' => Hash::make($newPassword),
            //       'password_show' => $newPassword
            //   ])->save();
              $data['full_name']='';
              $data['new_password']=$newPassword;
              $data['email']=$toEmail;
              $fileName='forgetpassword_template';
              sendEmail($toEmail,$subject,$fileName,$data);
               
        // }
       
        return redirect()->route('login');

    }
    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
