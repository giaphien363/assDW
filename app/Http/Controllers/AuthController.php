<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.signup');
    }


    // check test login
    public function checkLogIn(Request $request)
    {
        // validation request
        $request->validate([
            'username' => 'required | min:4',
            'password' => 'required | max: 12 | min:4',
        ]);

        // xac thuc
        $cre = $request->only(['username', 'password']);


        if (Auth::attempt($cre)) {
            // dd(Auth::user()->status);
            if (Auth::user()->status == 1) {
                return redirect()->route('dashboard');
            }
            Auth::logout();
            return back()->with([
                'fail' => 'We do not recognize your account',
            ]);
        } else {
            return back()->with([
                'fail' => 'We do not recognize your account',
            ]);
        }
    }

    // check form sign up
    public function checkSignUp(RegisterRequest $request)
    {
        // validation request   image/png "   image/jpeg
        $request->validated();

        $user = new User;

        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;

        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);


        if (
            isset($request->file_img)
            &&
            ($request->file_img->getMimeType() == 'image/png' ||
                $request->file_img->getMimeType() == 'image/jpeg' ||
                $request->file_img->getMimeType() == 'image/jpg')
            && $request->file_img->getSize() <= 5120
        ) {
            $extension = $request->file('file_img')->guessClientExtension();
            $new_name_img = time() . '-' . $request->username . '.' . $extension;

            // move image to public images folder
            $request->file_img->move(public_path('images', $new_name_img));

            $user->image =  $new_name_img;
        }

        $save = $user->save();

        if ($save) {
            $cre = $request->only(['username', 'password']);


            if (Auth::attempt($cre)) {
                if (Auth::user()->status == 1) {
                    return redirect()->route('dashboard');
                }
                Auth::logout();
                return back()->with([
                    'fail' => 'We do not recognize your account',
                ]);
            } else {
                return back()->with([
                    'fail' => 'We do not recognize your account',
                ]);
            }
        } else {
            return back()->with('fail', 'an error occurred!');
        }
    }
}
