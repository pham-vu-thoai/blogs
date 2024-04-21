<?php

namespace App\Http\Controllers;

use App\Model\user\category;
use App\Models\admin\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = categories::get();
        return view('backend.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Lấy dữ liệu category từ request
        $category = $request->input('category');

        $posts = DB::select('SELECT posts.id, posts.title, categories.name, posts.image, posts.like, posts.dislike, posts.status, posts.created_at FROM posts JOIN category_posts ON posts.id = category_posts.post_id JOIN categories ON category_posts.category_id = categories.id WHERE name = ?', [$category]);
        
        // Xử lý lưu dữ liệu vào cơ sở dữ liệu hoặc làm bất kỳ điều gì bạn muốn ở đây

        // Chuyển hướng trở lại trang gốc hoặc trang khác nếu cần
        return view('backend.category.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   
}
