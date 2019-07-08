<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\Welcome;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|max:255|unique:users',
            'phone' => 'numeric|required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'referrer' => $data['referrer'],
            'avatar' => $data['avatar'],
            'password' => Hash::make($data['password']),
            'activate_token' => str_random(64),
            'is_activated' => false,
        ]);
    }

    public function showRegistrationForm($referrer = '')
    {
        return view('auth.register', compact('referrer'));
    }

    public function activate($email, $token)
    {
    	$user = User::where(['email' => $email])->first();
    	if ($user->activate_token == $token){
    		$user->is_activated = true;
    		$user->activate_token = null;
    		$user->save();
    		\Session::flash('success', 'Your account has been activated');
    		return redirect(route('dashboard'));
    	} else {
            auth()->user()->forceFill(['activate_token' => str_random(64)])->save();
     	    \Mail::to($user)->send(new Welcome($user));
    		$message = 'Invalid token! Try again!';
            return view('message', compact('message'));
    	}
    }

    public function getResendActivationMail()
    {
        return view('auth.resend_activate');
    }
    public function resendActivationMail(Request $request)
     {
        $user = User::where(['email' => $request->email])->first();
        if (!$user) {
            return back()->with('error', 'user does not exist!');
        }
     	$user->forceFill(['activate_token' => str_random(64)])->save();
     	\Mail::to($user)->send(new Welcome($user));
     	return back()()->with('success', 'mail had been sent!');
     }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // \Mail::to($user)->send(new Welcome($user));
        $message = 'Thank you for joinning us! Please check your email box and follow the link to activate your account.';
        auth()->logout();
        return view('message', compact('message'));
    }

     
}
