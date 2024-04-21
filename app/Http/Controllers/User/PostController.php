<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\User\Category;
use App\Models\user\dislike;
use App\Models\User\Like;
use App\Models\User\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	public function show($slug)
	{
		$post = Post::where('slug', $slug)->firstOrFail();
		$categories = Category::all();
		$author = Admin::find($post->posted_by);
		return view('frontend.post', compact('post', 'categories', 'author'));
	}

	public function saveLike(request $request)
    {
    	$likecheck = like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->first();
    	if ($likecheck) {
    		like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->delete();
    		return 'deleted';
    	}else{
	    	$like = new like;
	    	$like->user_id = Auth::id();
	    	$like->post_id = $request->id;
	    	$like->save();
    	}
    }
	
	public function saveDislike(Request $request)
	{
		$dislikecheck = dislike::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->first();
    	if ($dislikecheck) {
    		dislike::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->delete();
    		return 'deleted';
    	}else{
	    	$like = new dislike;
	    	$like->user_id = Auth::id();
	    	$like->post_id = $request->id;
	    	$like->save();
    	}
	}

}
