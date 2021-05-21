<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('dashboard');
    }
}
