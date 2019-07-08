<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Quiz;

class AdminController extends Controller
{
    public function showAllTicket()
    {
    	dd(Ticket::where('token', '!=', 'bonus')->get());
    }

   	public function showAllToPay($quiz_type = null)
   	{
		$status = 'Unpaid';
		$quizzes = Quiz::where(['is_winner' => true, 'has_been_paid' => null])->with('user', 'quiz_type')->paginate(15);
		return view('winners', compact('quizzes', 'status'));
   	}

   	public function showAllPaid($quiz_type = null)
   	{
		$status = "Paid";
   		$quizzes = Quiz::where(['is_winner' => true, 'has_been_paid' => true])->with('user', 'quiz_type')->paginate(15);
   		return view('winners', compact('quizzes', 'status'));
   	}

   	public function markAsPaid(Quiz $quiz)
   	{
   		$quiz->has_been_paid = true;
        $quiz->quiz_status_id = 3;
   		$quiz->save();
        return back()->with('info', 'Marked successfully!');
    }
}
