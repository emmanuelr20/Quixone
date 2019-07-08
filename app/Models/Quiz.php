<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];
    protected $hidden = [];
    
    public function questions()
    {
    	return $this->belongsToMany('App\Models\Question');
    }
    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function quiz_type()
    {
    	return $this->belongsTo('App\Models\QuizType');
    }
    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket');
    }
}
