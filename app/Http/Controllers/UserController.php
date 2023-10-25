<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //Fuction untuk menampilkan semua data user
    public function index(Request $request)
    {
        if($request->search){
            return view('dashboard.custumer.index', [
                'title' => 'PARIWISATA E-TIKETT',
                'users' => User::where('username', 'LIKE', '%' . $request->search . '%')->latest()->paginate(2)
            ]);
        }else{
            return view('dashboard.custumer.index', [
                'title' => 'PARIWISATA E-TIKETT',
                'users' => User::all()
            ]);
        }
    }

    // Function untuk proses menampilkan view cetak pdf data custumer
    public function pdf()
    {
        return view('dashboard.custumer.pdf_custumer', [
            'users' => User::all()
        ]);
    }

    // Function untuk menampilkan detal / show data custumer
    public function show(User $user)
    {
        return view('dashboard.custumer.show', [
            'title' => 'PARIWISATA E-TIKET',
            'user' => $user
        ]);
    }

}
