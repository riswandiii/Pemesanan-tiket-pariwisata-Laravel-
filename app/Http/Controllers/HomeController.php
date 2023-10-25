<?php

namespace App\Http\Controllers;

use App\Models\Parawisata;
use Illuminate\Http\Request;
use PhpParser\Builder\Param;

class HomeController extends Controller
{
    //function untuk menampilkan view home
    public function index(Request $request)
    {

        if($request->search){
            return view('home', [
                'title' => 'PARAWISATA E-TIKET',
                'parawisatas' => Parawisata::where('parawisata', 'LIKE', '%' . $request->search . '%')->latest()->paginate(3)
        ]);
        }else{
            return view('home', [
                'title' => 'PARAWISATA E-TIKET',
                'parawisatas' => Parawisata::latest()->paginate(2)
        ]);
        }
    }

    // Function untuk menampilkan view contact us
    public function contact()
    {
        return view('contact.index', [
            'title' => 'PARAIWISATA E-TIKET'
        ]);
    }

}
