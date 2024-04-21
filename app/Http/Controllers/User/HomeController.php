<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Category;
use App\Models\User\Post;
use App\Models\User\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::where('status', 0)
                     ->orderBy('created_at', 'DESC')
                     ->paginate(5);
        return view('frontend.blogs', compact('posts', 'categories'));
    }

    public function tag(Tag $tag)
    {
        $categories = Category::all();
        $posts = $tag->posts()->where('status', 0);
        return view('frontend.blogs', compact('posts','categories'));
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $posts = $category->posts()->where('status', 0);
        return view('frontend.blogs', compact('posts','categories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $query = $request->input('query');

        // Tìm kiếm bài viết có tiêu đề hoặc nội dung chứa từ khóa tìm kiếm
        $posts = Post::where('title', 'like', '%' . $query . '%')
                     ->orWhere('body', 'like', '%' . $query . '%')
                     ->where('status', 0)                    
                     ->orderBy('created_at', 'DESC')
                     ->paginate(5);

        return view('frontend.search_result', compact('posts', 'query', 'categories'));
    }
}
