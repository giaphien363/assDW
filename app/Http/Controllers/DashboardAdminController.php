<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.check');
    }

    public function index()
    {
       
        // dd($_SERVER['REQUEST_URI']);
        return view('admin.admin_dashboard');
    }
}
