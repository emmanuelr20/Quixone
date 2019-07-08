<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];
    
    public function answer()
    {
    	return $this->belongsTo('App\Models\Option', 'answer_id');
    }
    public function options()
    {
    	return $this->hasMany('App\Models\Option');
    }
    public function question_type()
    {
    	return $this->belongsTo('App\Models\QuestionType');
    }
    public function question_level()
    {
    	return $this->belongsTo('App\Models\QuestionLevel');
    }
    public function quiz_type()
    {
    	return $this->belongsTo('App\Models\QuizType');
    }
    public function subject()
    {
    	return $this->belongsTo('App\Models\subject');
    }
    public function quizzes()
    {
    	return $this->belongsToMany('App\Models\Quiz');
    }

    public function isGerman()
    {
        return $this->question_type->name == 'german';
    }
}
