<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function posts()
    {
    	return $this->belongsToMany('App\Models\user\post','post_tags')->orderBy('created_at','DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
