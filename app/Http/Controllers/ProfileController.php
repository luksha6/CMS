<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        return view('layouts.profile');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.editProfile', compact('user'));
    }

    public function password(Request $request)
    {
        $user = Auth::user();

        $this->validate(request(), [
            'password' => 'required|min:6',
            'password-old' => 'required|min:6',
            'password-repeat' => 'required|same:password'
        ]);

        $pass = request('password');
        $passold = request('password-old');

        if (Hash::check($passold, $user->password)) {
            $user->password = bcrypt($pass);
            $user->save();
            Session::flash('flash_message', 'Uspješna izmjena lozinke!');
            return back();
        } else {
            Session::flash('flash_message', 'Neuspješna izmjena lozinke!');
        }
        return back();
    }


    public function update(Request $request)
    {

        $user = Auth::user();

        $this->validate(request(), [

            'name' => 'required',
            'email' => 'required'
        ]);

        if ($request->hasFile('profile_pic')) {

            $profile_pic = $request->file('profile_pic');
            $filename = time() . '.' . $profile_pic->getClientOriginalExtension();

            Image::make($profile_pic)->resize(200, 200)->save(public_path('/uploads/profile/' . $filename));

            $user->profile_pic = $filename;
        }

        $user->name = request('name');

        $user->save();

        Session::flash('flash_message', 'Profil uspješno uređen!');
        return back();
    }
}
