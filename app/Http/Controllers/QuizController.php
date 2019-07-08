<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizType;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Ticket;

class QuizController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        $quizzes = Quiz::where([ 
            'user_id' => auth()->user()->id,
        ])->get();

        return view('my_quizzes', compact('quizzes'));
    }

    protected function startQuiz($subjects, $quiz_type, $token = 'wallet'){
        Ticket::create([
            'token' => $token,
            'user_id' => auth()->user()->id,
            'is_valid' => true,
        ]);
        return $this->create($subjects, $quiz_type);
    }

    public function playNow(Request $request, $quiz_type = null)
    {
        if (auth()->user()->wallet >= 100 ) {
            auth()->user()->wallet -= 100;
            auth()->user()->save();
            return $this->startQuiz($request->subjects, $request->quiz_type);
        }
        return redirect(route('deposit'))->with('error' , 'insufficient funds in wallet to conitinue, please deposit and try again.');
    }

    protected function generateQuestions($subjects, $quiz_type = 1)
    {
        $questions = Question::where('id', '-1')->get();
        //question level (i.e as related to quiz level 0 for easy, 1 for difficult)
        foreach ($subjects as $key => $subject) {
            for ($i=1; $i < 3; $i++) { 
                $questions = $questions->merge(
                    Question::where(['subject_id' => $subject, 'question_level_id' => $i, 'quiz_type_id' => $quiz_type])
                        ->with('options')->get()->random(1));
            }
        }
        if ($quiz_type == 1) {
            $gen_sub = Subject::where('name', 'general')->first();
            $general_questions = Question::where('subject_id', $gen_sub->id)->with('options')->get()->random(6);
            $questions = $questions->merge($general_questions)->sortBy('body');
        }
        return $questions;
    }

    protected function updateReferral()
    {
       if (auth()->user()->referrer && !auth()->user()->quizzes()->count()) {
           $user = User::where('username', auth()->user()->referrer)->first();
           $user->bonus ? $user->bonus += 20 : $user->bonus = 20;
           $user->save();
       } 
       return;
    }
    /*
        quiz_type 1 = 7 questions  @100 for #10000
        quiz_type 2 = 2 questions  @100 for #5000
    */
    public function create($subjects, $quiz_type = 1)
    {
        $ticket = auth()->user()->tickets()->where('is_valid', true)->first();
        if ($ticket){
            $this->updateReferral();
            $quiz = Quiz::create([
                'user_id' => auth()->user()->id,
                'quiz_status_id' => 1,
                'current_question' => 0,
                'score' => 0,
                'quiz_type_id' => $quiz_type
            ]);
            if ($quiz_type == 1) {
                $questions = $this->generateQuestions($subjects)->random(7);
            } else {
                $questions = $this->generateQuestions($subjects, 1)->random(2);
            }
            $quiz->questions()->attach($questions);
            $quiz->subjects()->attach($subjects);
            $quiz->save();
            $question = $quiz->questions[$quiz->current_question];
            $ticket->is_valid = false;
            $ticket->save();
        } else {
            return redirect()->route('select_quiz')->with('info', 'You have not made payment!');
        }
        return view('exams', compact('quiz', 'question'));
    }

    public function resume($id)
    {
        $quiz = Quiz::where('id', $id)->with(['questions' => function($q){
            $q->with(['options', 'answer']);
        }])->first();
        if ($quiz->current_question >= $quiz->questions->count() - 1) {
            return redirect()->route('quiz_result', ['id', $quiz->id]);
        } else {
            $question = $quiz->questions[$quiz->current_question];
            return view('exams', compact('quiz', 'question'));
        }
    }

    public function select(QuizType $quiz_type)
    {
        if (!$quiz_type->is_active){
            return redirect(route('dashboard'))->with('error', 'This quiz type is currently unavailable');
        }
        $subjects = Subject::where('name', '!=', 'general')->with('questions')->get();
        return view('select_quiz', compact('subjects', 'quiz_type'));
    }

    public function next(Request $request, $id)
    {
        $quiz = Quiz::where('id', $id)->with(['questions' => function($q){
            $q->with(['options', 'answer']);
        }])->first();
        $question = $quiz->questions[$quiz->current_question];

        if($request->answer){
            if($question->isGerman()){
                if(strtolower($question->answer->body) == strtolower($request->answer)){
                    $quiz->score += 1;
                }
            } else {
                if($question->answer->id == $request->answer){
                    $quiz->score += 1;
                }
            }
        }
        if($quiz->current_question >= $quiz->questions->count() - 1) {
            $quiz->current_question += 1;
            $quiz->quiz_status_id = 2;
            $quiz->save();
            return response()->json(['status' => 'done']);
        }
        
        $quiz->current_question += 1;
        $quiz->save();
        $question = $quiz->questions[$quiz->current_question];
        return  view('partials.exams', compact('question', 'quiz'));
    }

    public function delete(Quiz $quiz)
    {
        $quiz->delete();
        return back()->with('info', 'Quiz has been deleted sucessfully');
    }

    public function result(Quiz $quiz)
    {
        if (auth()->user()-is_admin || auth()->user()->id == $quiz->user_id) {
            if ( $quiz->quiz_status_id <= 2 && $quiz->current_question > $quiz->questions->count() - 1) {
                if ($quiz->score >= $quiz->questions->count()) {
                    $quiz->is_winner = true;
                } 
                $quiz->quiz_status_id = 2;
                $quiz->save();
            }
            return view('results', compact('quiz'));
        } else {
            return redirect(route('dashboard'))->with('info','This Quiz was not taken by You!');
        }
    }
}
