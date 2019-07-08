<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

   public function quiz()
   {
   		return $this->belongsTo('App\Models\Quiz');
   }
   public function user()
    {
        return $this->belongsTo('App\User');
    }
}
