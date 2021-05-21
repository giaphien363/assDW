<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function login()
    {
        
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.admin_login.admin_login');
    }

    public function checkLogIn(Request $request)
    {
        // validation request
        $request->validate([
            'username' => 'required | min:4',
            'password' => 'required | max: 12 | min:4',
        ]);

        // xac thuc
        $cre = $request->only(['username', 'password']);

        if (Auth::guard('admin')->attempt($cre)) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with([
                'fail' => 'We do not recognize your account',
            ]);
        }
    }
}
