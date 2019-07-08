<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function changePassword(Request $request)
    {
        $user = auth()->user();
        $validate = \Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed',
            ]);
        if ($validate->fails()){
            return back()->withErrors($validate)->with('error', 'Error Occured!');
        }
        if (\Hash::check($request->old_password, $user->password)) {
            $user->password = \Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password changed successfully!');
        } else {
        	return back()->with('error','Incorrect password!');
        }
    }

    public function updateShowProfile()
    {
        return view('update_profile');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|string',
            'phone' => 'numeric|required',
        ]);
        if (auth()->user()->username != $request->username && User::where('username', $request->username)->exists()) {
            return back()->with('error', 'Username has been taken');
        }        
        auth()->user()->name = $request->name;
        auth()->user()->username = $request->username;
        auth()->user()->phone = $request->phone;
        auth()->user()->save();

        return back()->with('success', 'Update Successful!');
    }

    public function updateBankDetails(Request $request)
    {
        auth()->user()->bank_name = $request->bank_name;
        auth()->user()->bank_account_name = $request->account_name;
        auth()->user()->bank_account_no =  $request->account_number;
        auth()->user()->save();
        return back()->with('success', 'Bank account details updated successfully!');
    }

    public function index()
    {
        $subject = Subject::withCount('quizzes')
                    ->orderBy('quizzes_count', 'desc')
                    ->first();
        return view('dashboard', compact('subject'));
    }
}
