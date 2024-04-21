<?php

namespace App\Models\user;

use App\Models\admin\admin;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public function tags()
    {
        return $this->belongsToMany('App\Models\user\tag', 'post_tags')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\user\category', 'category_posts')->withTimestamps();
    }
    // Trong Model Post, thiết lập quan hệ với model User
    public function user()
    {
        return $this->belongsTo(admin::class, 'posted_by')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function likes()
    {
        return $this->hasMany('App\Models\user\like');
    }
    public function dislikes()
    {
        return $this->hasMany('App\Models\user\dislike');
    }
    // public function getSlugAttribute($value)
    // {
    //     return route('post',$value);
    // }
}
