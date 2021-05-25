<?php

namespace App\Http\Controllers;

use App\Models\Objects;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.check');
    }

    public function showrole()
    {
        $role = Role::all()->toArray();
        // dd($role[0]['id']);

        $role_obj = DB::table('role_object')->get()->toArray();
        $role_obj = array_map(function ($item) {
            return (array) $item;
        }, $role_obj);

        $result = [];

        foreach ($role_obj as $item) {
            $rl = Role::where('id', $item['ROLE_ID'])->first();
            $obj = Objects::where('id', $item['OBJECT_ID'])->first();


            $temp = [
                'id' => $item['id'],
                'rolename' => $rl['ROLE_NAME'],
                'objname' => $obj['OBJECT_NAME'],
                'created_by' => $item['created_by'],
                'status' => $item['status']
            ];

            array_push($result, $temp);
        };

        //

        $all_obj = Objects::all()->toArray();

        // dd($all_obj[1]);

        return view('admin.manage_role.show_role')->with('data', $role)->with('roleobj', $result)->with('allobj', $all_obj);
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
