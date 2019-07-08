<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionLevel extends Model
{
    public function questions()
    {
    	return $this->hasMany('App\Models\Question');
    }
}
