<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Objects;
use App\Models\Role;

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

        return redirect()->route('admin.showrole');

        // return view('admin.manage_role_obj.show_role_obj')->with('data', $role_obj);
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
            'rolecode' => 'required ',
            'objid' => 'required ',
        ]);


        $role = Role::where('ROLE_CODE', $request->rolecode)->first();
        $obj = Objects::whereIn('id', $request->objid)->get();

        // dd($obj[0]);

        if ($role == null) {
            return back()->with('fail', 'Role code was not found!');
        }

        if (count($obj) == 0) {
            return back()->with('fail', 'User name was not found!');
        }

        foreach ($obj as $item) {
            $role_obj = DB::table('role_object')->insert([
                'OBJECT_ID' => $item['id'],
                'ROLE_ID' => $role['id'],
                'created_by' => Auth::guard('admin')->user()->username
            ]);
        }

        return redirect()->route('admin.showroleobject');
    }

    public function edit($id)
    {
        $role_obj = DB::table('role_object')->where('id', $id)->first();
        $role_obj = (array)$role_obj;

        $role = Role::where('id', $role_obj['ROLE_ID'])->first();
        // dd($role_obj);

        $all_obj = Objects::all()->toArray();

        return view('admin.manage_role_obj.edit_role_obj')->with('data', $role_obj)->with('role', $role)->with('allobj', $all_obj);
    }

    public function handle_edit($id, Request $request)
    {
        $request->validate([
            'objid' => 'required | numeric',
            'rolecode' => 'required',
            'status' => 'required'
        ]);

        $role = Role::where('ROLE_CODE', $request->rolecode)->first();

        $obj = Objects::where('id', $request->objid)->first();

        // dd($obj['id']);

        if ($role == null) {
            return back()->with('fail', 'Role code was not found!');
        }

        if ($obj == null) {
            return back()->with('fail', 'Object ID was not found!');
        }

        $role_obj = DB::table('role_object')
            ->where('id', $id)
            ->update([
                'OBJECT_ID' => $obj['id'],
                'ROLE_ID' => $role['id'],
                'status' => $request->status,
            ]);

        return redirect()->route('admin.showrole');
    }
}
