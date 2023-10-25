<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class EditProfileController extends Controller
{

    //Function untuk proses edit profile
    public function index(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $validateData = $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'no_handphone' => ['required'],
            'email' => ['email']
        ]);
        if($request->password_baru){
            $validateData['password'] = bcrypt($request->password_baru);
        }
        User::where('id', $user->id)->update($validateData);
        return redirect('/my-profil')->with('success', 'Edit data profile successful!');
    }

}
