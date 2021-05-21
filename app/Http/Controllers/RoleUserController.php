<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.check');
    }

    public function showrole_user()
    {
        $role_user = DB::table('role_user')->get()->toArray();
        $role_user = array_map(function ($item) {
            return (array) $item;
        }, $role_user);

        return view('admin.manage_role_user.show_role_user')->with('data', $role_user);
    }

    public function delrole_user($id)
    {
        $role_user =  DB::table('role_user')
            ->where('id', $id)
            ->update(['status' => 0]);

        return redirect()->route('admin.showrole.user');
    }

    public function create()
    {
        return view('admin.manage_role_user.create_role_user');
    }

    public function handle_create(Request $request)
    {
        $request->validate([
            'userid' => 'required | numeric',
            'roleid' => 'required | numeric',
        ]);
        // dd($request->all());

        $role_user = DB::table('role_user')->insert([
            'USER_ID' => $request->userid,
            'ROLE_ID' => $request->roleid,
            'created_by' => Auth::guard('admin')->user()->username
        ]);

        if ($role_user) {
            return redirect()->route('admin.showrole.user');
        } else {
            return back()->with('fail', 'an error occurred!');
        }
    }

    public function editrole_user($id)
    {
        $role_user = DB::table('role_user')->where('id', $id)->first();
        $role_user = (array)$role_user;
        return view('admin.manage_role_user.edit_role_user')->with('data', $role_user);
    }

    public function handle_edit($id, Request $request)
    {
        $request->validate([
            'userid' => 'required | numeric',
            'roleid' => 'required | numeric',
            'status' => 'required'
        ]);

        $role_user = DB::table('role_user')
            ->where('id', $id)
            ->update([
                'USER_ID' => $request->userid,
                'ROLE_ID' => $request->roleid,
                'status' => $request->status,
            ]);

        if ($role_user) {
            return redirect()->route('admin.showrole.user');
        } else {
            return back()->with('fail', 'an error occurred!');
        }
    }
}
