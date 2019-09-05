<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function update($id, Request $request)
    {

        $user = User::findOrFail($id);

        $this->validate(request(),[

            'name' => 'required',
            'email' => 'required'
        ]);

        $role = request('role');

        if($role == "Administrator"){
            $user->role = "admin";
        }

        if($role == "Moderator"){
            $user->role = "moderator";
        }
        if($role == "Korisnik"){
            $user->role = "user";
        }


        $user->update($request->all());
        $user->save();


        Session::flash('flash_message', 'Korisnik uspješno uređen!');
        return back();
    }

    public function password($id){

        $user = User::findOrFail($id);

        $this->validate(request(),[

            'password' => 'required|min:6',
            'password-repeat' => 'required|same:password'
        ]);

        $user->password = bcrypt(request('password'));
        $user->save();

        return back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();

    }
}
