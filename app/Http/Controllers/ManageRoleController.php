<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class ManageRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.check');
    }

    public function showrole()
    {
        $role = Role::all()->toArray();
        // dd($role);
        return view('admin.manage_role.show_role')->with('data', $role);
    }

    public function delrole($id)
    {
        $role = Role::where('id', $id)->first();

        $role->status = 0;

        $role->save();
        return redirect()->route('admin.showrole');
    }

    public function create()
    {
        return view('admin.manage_role.create_role');
    }

    public function handle_create(Request $request)
    {

        $request->validate([
            'role_code' => 'required | max:50',
            'role_name' => 'required | max:100',
            'description' => 'required | max:500',
        ]);

        // dd($request->all());
        $role = new Role;

        $role->ROLE_CODE = $request->role_code;
        $role->ROLE_NAME = $request->role_name;
        $role->DESCRIPTION = $request->description;
        $role->created_by = Auth::guard('admin')->user()->username;

        $save = $role->save();

        if ($save) {
            return redirect()->route('admin.showrole');
        } else {
            return back()->with('fail', 'an error occurred!');
        }
    }

    public function editrole($id)
    {
        $role = Role::where('id', $id)->first();
        return view('admin.manage_role.edit_role')->with('data', $role);
    }


    public function handle_edit($id, Request $request)
    {
        $request->validate([
            'role_code' => 'required | max:50',
            'role_name' => 'required | max:100',
            'description' => 'required | max:500',
            'status' => 'required'
        ]);
        
        $role = Role::where('id', $id)->first();

        $role->ROLE_CODE = $request->role_code;
        $role->ROLE_NAME = $request->role_name;
        $role->DESCRIPTION = $request->description;
        $role->status = $request->status;

        $role->updated_by = Auth::guard('admin')->user()->username;
        $save = $role->save();

        if ($save) {
            return redirect()->route('admin.showrole');
        } else {
            return back()->with('fail', 'an error occurred!');
        }
    }
}
