<?php

namespace App\Models\user;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    // public function tags()
    // {
    // 	return $this->belongsToMany('App\Model\user\tag','post_tags')->withTimestamps();
    // }

    // public function categories()
    // {
    // 	return $this->belongsToMany('App\Model\user\category','category_posts')->withTimestamps();;
    // }

    // public function getRouteKeyName()
    // {
    // 	return 'slug';
    // }

    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->diffForHumans();
    // }

    // public function likes()
    // {
    //     return $this->hasMany('App\Model\user\like');
    // }

    // public function getSlugAttribute($value)
    // {
    //     return route('post',$value);
    // }
}
