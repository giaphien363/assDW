<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ManageUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.check');
    }

    public function create()
    {
        return view('admin.manage_user.create_user');
    }

    public function handle_create(RegisterRequest $request)
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
        $user->create_by = Auth::guard('admin')->user()->username;

        $save = $user->save();
        if ($save) {
            return redirect()->route('admin.showuser');
        } else {
            return back()->with('fail', 'an error occurred!');
        }
    }


    public function showuser()
    {
        $users = User::all()->toArray();
        // dd($users);
        return view('admin.manage_user.show_user')->with('data', $users);
    }

    public function deluser($id)
    {
        $user = User::where('id', $id)->first();

        $user->status = 0;

        $user->save();
        return redirect()->route('admin.showuser');
    }

    public function edituser($id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.manage_user.edit_user')->with('data', $user);
    }



    public function handle_edit($id, EditRequest $request)
    {
        $user = User::where('id', $id)->first();

        $request->validated();

        if (Hash::check($request->password, $user->password)) {
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->status = $request->status;

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

            $user->update_by = Auth::guard('admin')->user()->username;

            $save = $user->save();

            if ($save) {
                return redirect()->route('admin.showuser');
            } else {
                return back()->with('fail', 'an error occurred!');
            }
        }

        return back()->with('fail', 'Incorrect password!');
    }
}
