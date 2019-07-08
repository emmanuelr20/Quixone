<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionType;
use App\Models\Question;
use App\Models\QuizType;
use App\Models\QuestionLevel;
use App\Models\Subject;
use App\Models\Option;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index($filter = null)
    {
        if ($filter == null) {
            $questions = Question::with('options')->paginate(10);
        } else {
            $questions = Question::where('subject_id', $filter)->with('options')->paginate(10);
        }
        return view('question_index', compact('questions'));
    }

    public function create()
    {
        $question_types = QuestionType::all();
        $quiz_types = QuizType::all();
        $question_levels = QuestionLevel::all();
        $subjects = Subject::all();
        return view('add_question', compact('subjects', 'question_types', 'question_levels', 'quiz_types'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'body' => 'required|string',
            'question_type' => 'required|integer|between:1,50',
            'quiz_type' => 'required|integer|between:1,3',
            'question_level' => 'required|integer|between:1,3',
            'subject' => 'required|integer',
            'answer'=>'required|string',
        ]);
        $question = Question::create([
            'body' => $request->body,
            'quiz_type_id' => $request->quiz_type,            
            'question_type_id' => $request->question_type,
            'question_level_id' => $request->question_level,
            'subject_id' => $request->subject,
    	]);
    	for ($i=0; $i < count($request->options); $i++) { 
    		Option::create([
    			'body' => $request->options[$i],
    			'question_id' => $question->id
    		]);
    	}
    	$answer = Option::create([
			'body' => $request->answer,
			'question_id' => $question->id
    	]);
    	$question->answer_id = $answer->id;
    	$question->save();
    	return back()->with('success', 'Question created successfully!');
    }

    public function delete(Question $question)
    {
    	$question->options()->delete();
    	$question->delete();
    	return back()->with('Question deleted successfully!');
    }

}
