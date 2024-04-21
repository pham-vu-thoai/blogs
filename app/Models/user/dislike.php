<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class dislike extends Model
{
    public function post()
    {
    	return $this->belongsTo('App\Models\user\post','dislike'); 
    }
}
