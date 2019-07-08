<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        login as protected traitLogin;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // add email and username request bag for query where $request->email can be username or email 
        $request->request->set('email', $request->email);
        $request->request->set('username', $request->email);

        //set login credential to set username function by
        $this->loginCredential = $request->email;
        $user = filter_var($this->loginCredential, FILTER_VALIDATE_EMAIL) ? 
            User::where('email', $this->loginCredential)->first() : User::where('username', $this->loginCredential)->first();
        // if($user && !$user->is_activated){
        //     $message = 'Your account has not been activeted. Please check your email box and follow the link to activate your account.';
        //     return view('message', compact('message')); 
        // }
        return $this->traitLogin($request);
    }

    /**
     * Get the login field to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return filter_var($this->loginCredential, FILTER_VALIDATE_EMAIL) ? 'email': 'username';
    }
}
