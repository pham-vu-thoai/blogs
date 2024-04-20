<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\user\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('can:posts.category');
    }

    public function index()
    {
        $categories = category::all();
        return view('admin.category.show',compact('categories'));
    }

   
    public function create()
    {
        return view('admin.category.category');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            ]);
        $category = new category;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect(route('category.index'));
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $category = category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            ]);
        $category = category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect(route('category.index'));
    }

  
    public function destroy($id)
    {
        category::where('id',$id)->delete();
        return redirect()->back();
    }
}
