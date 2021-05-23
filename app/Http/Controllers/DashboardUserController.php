<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
       
    }

    public function index()
    {
        // dd(Auth::user()->status);
        if (Auth::user()->status == 0) {
            Auth::logout();
            return redirect()->route('login');
        }
        $dsobject = DB::select('select objects.* from role_object inner join objects on role_object.OBJECT_ID = objects.id where role_object.ROLE_ID = (select ROLE_ID from role_user where USER_ID = ?) and objects.status = ?', [Auth::user()->id, 1]);
        return view('dashboard', compact("dsobject"));
    }
}
