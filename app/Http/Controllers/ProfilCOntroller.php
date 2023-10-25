<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilCOntroller extends Controller
{
    //function untuk menampilkan view profil
    public function profil()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('profil.profil', [
            'title' => 'PARIWISATA E-TIKET',
            'user' => $user,
            'nama' => auth()->user()->username
        ]);
    }
}
