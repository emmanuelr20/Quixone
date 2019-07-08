<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $subjects = Subject::paginate(20);
        return view('subjects_index', compact('subjects'));
    }

    public function create(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|string',
        ]);

    	$subject = Subject::create([
    		'name' => $request->name,
    	]);

    	return back()->with('success', 'Subject created successfully!');
    }

    public function delete(Subject $subject)
    {
    	$subject->delete();
    	return back()->with('Subject deleted successfully!');
    }
}
