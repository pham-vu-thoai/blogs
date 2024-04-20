<?php

namespace App\Http\Controllers\Admin;
use App\Models\admin\Permission;
use App\Http\Controllers\Controller;
use App\Models\admin\Role;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RoleController extends Controller
{
    use ValidatesRequests;
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $roles = role::all();
        return view('backend.role.show',compact('roles'));
    }

    public function create()
    { 
        $permissions = Permission::all();
        return view('backend.role.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|max:50|unique:roles'
            ]);
        $role = new role;
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect(route('role.index'));
    }

    // public function show($id)
    // {
    //     $role = role::findOrFail($id);
    // // Truyền dữ liệu cho view và hiển thị view
    //     return view('backend.role.show', compact('role'));
    // }

    // public function show()
    // {
    //     return redirect(route('role.index'));
    // }

    public function edit($id)
    {
        $role = role::find($id);
        $permissions = Permission::all();
        return view('backend.role.edit',compact('role','permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' =>'required|max:50'
            ]);
        $role = role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect(route('role.index'));
    }

    public function destroy($id)
    {
        role::where('id',$id)->delete();
        return redirect()->back();
    }
}
