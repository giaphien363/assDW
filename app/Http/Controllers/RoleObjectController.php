<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleObjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.check');
    }

    public function index()
    {
        $role_obj = DB::table('role_object')->get()->toArray();
        $role_obj = array_map(function ($item) {
            return (array) $item;
        }, $role_obj);

        return view('admin.manage_role_obj.show_role_obj')->with('data', $role_obj);
    }

    public function delrole_object($id)
    {
        $role_obj =  DB::table('role_object')
            ->where('id', $id)
            ->update(['status' => 0]);

        return redirect()->route('admin.showroleobject');
    }

    public function create()
    {
        return view('admin.manage_role_obj.create_role_obj');
    }

    public function handle_create(Request $request)
    {
        $request->validate([
            'objid' => 'required | numeric',
            'roleid' => 'required | numeric',
        ]);
        // dd($request->all());

        $role_obj = DB::table('role_object')->insert([
            'OBJECT_ID' => $request->objid,
            'ROLE_ID' => $request->roleid,
            'created_by' => Auth::guard('admin')->user()->username
        ]);

        if ($role_obj) {
            return redirect()->route('admin.showroleobject');
        } else {
            return back()->with('fail', 'an error occurred!');
        }
    }

    public function edit($id)
    {
        $role_obj = DB::table('role_object')->where('id', $id)->first();
        $role_obj = (array)$role_obj;
        return view('admin.manage_role_obj.edit_role_obj')->with('data', $role_obj);
    }

    public function handle_edit($id, Request $request)
    {
        $request->validate([
            'objid' => 'required | numeric',
            'roleid' => 'required | numeric',
            'status' => 'required'
        ]);

        $role_obj = DB::table('role_object')
            ->where('id', $id)
            ->update([
                'OBJECT_ID' => $request->objid,
                'ROLE_ID' => $request->roleid,
                'status' => $request->status,
            ]);

        if ($role_obj) {
            return redirect()->route('admin.showroleobject');
        } else {
            return back()->with('fail', 'an error occurred!');
        }
    }
}
