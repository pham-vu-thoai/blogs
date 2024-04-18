<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\admin\Permission;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
class PermissionController extends Controller
{
    //
    use ValidatesRequests;
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.permission.show',compact('permissions'));
    }

    public function create()
    {
        return view('backend.permission.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50|unique:permissions',
            'for'  => 'required'
            ]);
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->for = $request->for;
        $permission->save();

        return redirect(route('permission.index'));
    }

    public function show(Permission $permission)
    {
        
    }

    public function edit(Permission $permission)
    {
        $permission = Permission::find($permission->id);
        return view('backend.permission.edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $this->validate($request,[
            'name' => 'required|max:50',
            'for'  => 'required'
            ]);
        $permission = Permission::find($permission->id);
        $permission->name = $request->name;
        $permission->for = $request->for;
        $permission->save();

        return redirect(route('permission.index'))->with('message','Permission updated successfully');
    }

    public function destroy(Permission $permission)
    {
        Permission::where('id',$permission->id)->delete();
        return redirect()->back()->with('message','Permission Deleted Successfully');
    }
}
