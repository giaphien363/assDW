<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Objects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dsobject = DB::select('select * from objects where status = ?', [1]);

        $dsobject = Objects::all()->toArray();

        return view('admin.manage_object.object', compact("dsobject"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsobject = DB::select('select * from objects');
        return view('admin.manage_object.create_object', compact("dsobject"));
    }


    public function handle_create(Request $request)
    {

        $request->validate([
            'object_code' => 'required | max:50',
            'object_name' => 'required | max:100',
            'description' => 'required | max:500',
        ]);

        $object = new Objects;
        $object->PARENT_ID = $request->parent_id;
        $object->OBJECT_CODE = $request->object_code;
        $object->OBJECT_NAME = $request->object_name;
        $object->OBJECT_URL = $request->object_url;
        $object->OBJECT_LEVEL = $request->object_level;
        $object->DESCRIPTION = $request->description;
        $object->created_by = Auth::guard('admin')->user()->username;

        $save = $object->save();

        if ($save) {
            return redirect()->route('admin.showobject');
        } else {
            return back()->with('fail', 'an error occurred!');
        }
    }

    public function editobject($id)
    {
        $dsobject = DB::select('select * from objects');
        $object = Objects::where('id', $id)->first();
        return view('admin.manage_object.edit_object', compact("dsobject"))->with('data', $object);
    }


    public function handle_edit($id, Request $request)
    {
        $request->validate([
            'object_code' => 'required | max:50',
            'object_name' => 'required | max:100',
            'description' => 'required | max:500',
            'status' => 'required'
        ]);

        $object = Objects::where('id', $id)->first();

        $object->PARENT_ID = $request->parent_id;
        $object->OBJECT_CODE = $request->object_code;
        $object->OBJECT_NAME = $request->object_name;
        $object->OBJECT_URL = $request->object_url;
        $object->OBJECT_LEVEL = $request->object_level;
        $object->DESCRIPTION = $request->description;
        $object->status = $request->status;
        $object->SHOW_MENU = $request->show_menu;
        $object->updated_by = Auth::guard('admin')->user()->username;
        $save = $object->save();

        if ($save) {
            return redirect()->route('admin.showobject');
        } else {
            return back()->with('fail', 'an error occurred!');
        }
    }

    public function delobject($id)
    {
        $object = Objects::where('id', $id)->first();

        $object->status = 0;

        $object->save();
        return redirect()->route('admin.showobject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
