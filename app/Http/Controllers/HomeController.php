<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Testimony;
use App\Models\QuizType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::latest()->limit(7)->get();
        return view('welcome', compact('testimonies'));
    }

    public function dashboard()
    {
        $all_quiz_types = QuizType::all();
        return view('dashboard', compact('all_quiz_types'));
    }
}
