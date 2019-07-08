<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;

class TestimonyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subjects = Subject::paginate(20);
        return view('testimonies', compact('subjects'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);
        Testimony::create([
            'body' => $request->body,
            'user_id' => auth()->user()->id
    	]);
    	return back()->with('success', 'Testimony created successfully!');
    }

    public function delete(Subject $subject)
    {
    	$subject->delete();
    	return back()->with('info', 'Testimony deleted successfully!');
    }
}
