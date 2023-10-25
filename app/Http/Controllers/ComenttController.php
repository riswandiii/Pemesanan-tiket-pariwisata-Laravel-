<?php

namespace App\Http\Controllers;
use App\Models\Coment;
use App\Models\Like;
use App\Models\Parawisata;
use Illuminate\Http\Request;
use PhpParser\Builder\Param;
use PhpParser\Node\Expr\FuncCall;

class ComenttController extends Controller
{
    

    public function index($id)
    {
        $coment = Coment::where('parawisata_id', $id)->get();
        $pariwisata = Parawisata::where('id', $id)->first();
        return view('koementar.komentar', [
            'title' => 'PARIWISATA E-TIKET',
            'pariwisata' => $pariwisata->parawisata,
            'pariwisatas' => $pariwisata,
            'comentar' => $coment
        ]);
    }


    // Function untuk proses melakukan komentar
    public function coment(Request $request)
    {
        $pariwisata = Parawisata::where('id', $request->parawisata_id)->first();
        $validasiData = $request->validate([
            'user_id' => ['required'],
            'parawisata_id' => ['required'],
            'coment' => ['required']
        ]);
        Coment::create($validasiData);
        return   redirect('/comentar/' . $pariwisata->id);
    }

    // Function untuk proses likes
    public function like(Request $request){
       $validasiData = $request->validate([
            'user_id' => ['required'],
            'parawisata_id' => ['required'],
            'like' => ['required']
       ]);
       Like::create($validasiData);
       return redirect('/');
    }


}
