<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\admin;
use App\Models\admin\role;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   
    public function index()
    {
        $users = admin::all();
        return view('backend.user.show',compact('users'));
    }

   
    public function create()
    {
        $roles = role::all();
        return view('backend.user.create',compact('roles'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('user.index'));
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $user = admin::find($id);
        $roles = role::all();
        return view('backend.user.edit',compact('user','roles'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
        ]);
        $request->status? : $request['status']=0;
        $user = admin::where('id',$id)->update($request->except('_token','_method','role'));
        admin::find($id)->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message','User updated successfully');
    }

  
    public function destroy($id)
    {
        admin::where('id',$id)->delete();
        return redirect()->back()->with('message','User is deleted successfully');
    }
}
