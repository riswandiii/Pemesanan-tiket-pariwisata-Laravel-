<?php

namespace App\Http\Controllers;
use Dotenv\Loader\Loader;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use App\Http\Controllers\Controller;
use App\Models\Parawisata;
use PDF;

class CetakController extends Controller
{
    //Function untuk proses cetak tiket ke pdf 
    public function cetak($id)
    {
        $cetak = PesananDetail::where('id', $id)->first();

        view()->share('data', $cetak);
        $pdf = PDF::loadview('pemesanan.cetakPdf');
        return $pdf->download('tiket.pdf');
    }

    // Function untuk proses cetak pdf data pariwisata
    public function pdfPariwisata()
    {   
        $pariwisata = Parawisata::all();
        // return view('dashboard.parawisata.pdfPariwisata', [
        //     'pariwisatas' => $pariwisata
        // ]);
        view()->share('pariwisatas', $pariwisata);
        $pdf = PDF::loadview('dashboard.parawisata.pdfPariwisata');
        return $pdf->download('pariwisata.pdf');
    }

}
