<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = [];
    
    public function questions()
    {
    	return $this->hasMany('App\Models\Question');
    }
    public function ready($quiz_type)
    {
        return $this->questions()->where([['question_level_id', '=', 1], ['quiz_type_id', '=', $quiz_type]])->count() > 1 &&
                    $this->questions()->where([['question_level_id', '=', 2], ['quiz_type_id', '=', $quiz_type]])->count() > 1;
    }
}
