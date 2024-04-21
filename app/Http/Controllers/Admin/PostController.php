<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user\post;
use Illuminate\Support\Str;
use Psy\Readline\Hoa\Console;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $posts = post::all();
        return view('backend.post.post', compact('posts')) ;        
    }
    public function uploadImage(Request $request){
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName,PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('upload'), $fileName);

            $url =asset('public/upload/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
            // return response()->json(['url' =>'https://i.pinimg.com/564x/64/13/68/6413681389df912f241f1f500f80b623.jpg']);
        }
    }

    public function create()
    {
        return view('backend.post.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:public,private',
        ]);

        // Generate slug from the title
        $slug = Str::slug($validatedData['title']);
        // Create a new post instance
        $post = new post();
        $post->title = $validatedData['title'];
        $post->subtitle = $validatedData['subtitle'];
        $post->slug = $slug;
        $post->body = $validatedData['content'];
        $post->status = ($validatedData['status'] == 'private') ? 1 : 0;


        // $post->image = $validatedData['image'];
        // Assuming 'posted_by' is the authenticated user's ID
        $post->posted_by = 145;
        $post->like = 0;
        $post->dislike = 0;

        // Save the post to the database
        $post->save();


        // Redirect the user to the newly created post
        return redirect()->route('post')->with('success', 'Post created successfully!');
    }
    public function edit($id)
    {
        // Lấy thông tin của bài viết cần chỉnh sửa từ cơ sở dữ liệu
        $post = post::findOrFail($id);

        // Trả về view edit.blade.php và truyền dữ liệu bài viết cho view
        return view('backend.post.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        // Validate dữ liệu từ request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:public,private,draft',
        ]);

        // Tìm bài viết cần chỉnh sửa trong cơ sở dữ liệu
        $post = Post::findOrFail($id);
        $slug = Str::slug($validatedData['title']);
        // Cập nhật thông tin của bài viết từ dữ liệu mới
        $post->title = $validatedData['title'];
        $post->subtitle = $validatedData['subtitle'];
        $post->body = $validatedData['content'];
        $post->status = ($validatedData['status'] == 'private') ? 1 : 0;
        $post->slug = $slug;

        // Lưu thay đổi vào cơ sở dữ liệu
        $post->save();

        // Chuyển hướng về trang hiển thị bài viết đã chỉnh sửa
        return redirect()->route('post')->with('success', 'Post updated successfully!');
    }
    public function destroy($id)
    {
        // Tìm bài viết cần xóa từ cơ sở dữ liệu
        $post = post::findOrFail($id);

        // Xóa bài viết
        $post->delete();

        // Chuyển hướng về trang danh sách bài viết sau khi xóa
        return redirect()->route('post')->with('success', 'Post deleted successfully!');
    }
    public function show($slug)
    {
        // Tìm bài post dựa trên slug
        $post = Post::where('slug', $slug)->firstOrFail();

        // Trả về view 'show' với dữ liệu của bài post
        return view('backend.post.show', compact('post'));
    }
    
}
