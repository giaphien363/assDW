<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;

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

        return redirect()->route('admin.showuser');

        // return view('admin.manage_role_user.show_role_user')->with('data', $role_user);
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
            'username' => 'required | min:4 ',
            'rolecode' => 'required | max:50',
        ]);
        // dd($request->all());
        $role = Role::where('ROLE_CODE', $request->rolecode)->first();
        $user = User::where('username', $request->username)->first();

        if ($role == null) {
            return back()->with('fail', 'Role code was not found!');
        }

        if ($user == null) {
            return back()->with('fail', 'User name was not found!');
        }

        $role_user = DB::table('role_user')->insert([
            'USER_ID' => $user['id'],
            'ROLE_ID' => $role['id'],
            'created_by' => Auth::guard('admin')->user()->username
        ]);

        if ($role_user) {
            return redirect()->route('admin.showrole.user');
        } else {
            return back()->with('fail', 'An error occurred!');
        }
    }

    public function editrole_user($id)
    {
        $role_user = DB::table('role_user')->where('id', $id)->first();
        $role_user = (array)$role_user;

        $role = Role::where('id', $role_user['ROLE_ID'])->first();
        $user = User::where('id', $role_user['USER_ID'])->first();

        $temp = [
            'id' => $role_user['id'],
            'username' => $user['username'],
            'rolecode' => $role['ROLE_CODE'],
            'status' => $role_user['status']
        ];

        return view('admin.manage_role_user.edit_role_user')->with('data', $temp);
    }

    public function handle_edit($id, Request $request)
    {
        $request->validate([
            'username' => 'required | min:4 ',
            'rolecode' => 'required | max:50',
            'status' => 'required'
        ]);

        $role = Role::where('ROLE_CODE', $request->rolecode)->first();
        $user = User::where('username', $request->username)->first();

        if ($role == null) {
            return back()->with('fail', 'Role code was not found!');
        }

        if ($user == null) {
            return back()->with('fail', 'User name was not found!');
        }

        $role_user = DB::table('role_user')
            ->where('id', $id)
            ->update([
                'USER_ID' => $user['id'],
                'ROLE_ID' => $role['id'],
                'status' => $request->status,
            ]);

        if ($role_user) {
            return redirect()->route('admin.showrole.user');
        } else {
            return back()->with('fail', 'An error occurred!');
        }
    }
}
