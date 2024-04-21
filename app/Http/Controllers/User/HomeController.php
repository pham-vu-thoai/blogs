<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user\category;
use App\Models\user\post;
use App\Models\user\tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(5);
    	return view('user.blog',compact('posts'));
    }
    public function tag(tag $tag)
    {
        $posts = $tag->posts();
        return view('user.blog',compact('posts'));
    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('user.blog',compact('posts'));
    }
}
