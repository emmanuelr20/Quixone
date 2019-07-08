<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizType;

class QuizTypeController extends Controller
{
    public function __construct() {
        $this->middleware('admin')->except('index');
    }

    public function activate(QuizType $quiz_type)
    {
        $quiz_type->is_active = true;
        $quiz_type->save();
        return back()->with(['info' => 'Activation Successful']);
    }

    public function deactivate(QuizType $quiz_type)
    {
        $quiz_type->is_active = false;
        $quiz_type->save();
        return back()->with(['info' => 'Activation Successful']);
    }

    public function toggle(QuizType $quiz_type)
    {
        $quiz_type->is_active = !$quiz_type->is_active;
        $quiz_type->save();
        if ($quiz_type->is_active) {
            return response()->json(['success' => 'Quiz type successfully switched on']);
        } else {
            return response()->json(['info' => 'Quiz type successfully switched off']);
        }
    }

    public function index()
    {
        $quiz_types = QuizType::where('is_active', true)->get();
        return view('select_quiz_type', compact('quiz_types'));
    }
}
