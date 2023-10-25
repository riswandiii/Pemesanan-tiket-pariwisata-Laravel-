<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{


    //function untuk menmpilkan vie login
    public function login()
    {
        return view('login.login', [
            'title' => 'PARIWISATA E-TIKET'
        ]);
    }

    // function untuk menampilkan view register
    public function register()
    {
        return view('register.register', [
            'title' => 'PARIWISATA E-TIKET'
        ]);
    }

    // funtion untuk proses registrasi
    public function registerProses(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'username' => ['required', 'min:5', 'max:255'],
            'no_handphone' => ['required', 'min:12', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password'=> ['required', 'min:5', 'max:255']
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);
        return redirect('/login')->with('success', 'Your registration is successful');
    }

    // Function untuk proses login
    public function loginProses(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }else{
            return redirect('/login')->with('success', 'Your email or password is wrong');
        }
    }

    // Function untuk proses logout
    public function logout(Request $request)
{
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login')->with('success', 'You made it out!');
}


}
