<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;

class PesananController extends Controller
{

    //Fucntion untuk menampilkan view data pesanan
    public function index(Request $request)
    {
       if($request->search){
            return view('dashboard.pesanan.index', [
                'title' => 'PARIWISATA E-TIKET',
                'pesanans' => Pesanan::where('tanggal_pesanan', 'LIKE', '%' . $request->search . '%')->latest()->paginate(2)
            ]);
       }else{
            return view('dashboard.pesanan.index', [
                'title' => 'PARIWISATA E-TIKET',
                'pesanans' => Pesanan::latest()->paginate(5)
            ]);
       }
    }

    // function untuk menampilkan view cetak data pesanan
    public function pdf()
    {
        return view('dashboard.pesanan.pdf_pesanan', [
            'pesanans' => Pesanan::all()
        ]);
    }

    // Function untuk menampilkan view detail pesanan
    public function detailPesanan($id)
    {
        $detailPesanan = PesananDetail::where('pesanan_id', $id)->get();
        $jumlah = $detailPesanan->count();
        return view('dashboard.pesanan.pesanan_detail', [
            'title' => 'PARIWISATA E-TIKET',
            'jumlahData' => $jumlah, 
            'detailPesanans' => $detailPesanan
        ]);
    }

}
