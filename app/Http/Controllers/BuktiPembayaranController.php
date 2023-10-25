<?php

namespace App\Http\Controllers;

use App\Models\BuktiPembayaran;
use App\Http\Requests\StoreBuktiPembayaranRequest;
use App\Http\Requests\UpdateBuktiPembayaranRequest;

class BuktiPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Function untuk menmpilkan view data bukti pembayaran 
        $data = BuktiPembayaran::all();
        $jumlah = $data->count();
        return view('dashboard.bukti_pembayaran.index', [
            'title' => 'PARIWISATA E-TIKET',
            'jumlah' => $jumlah,
            'datas' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {
        $data = BuktiPembayaran::all();
        $jumlah = $data->count()
;        return view('dashboard.bukti_pembayaran.pdf_pesanan_detail', [
            'title' => 'PARIWISATA E-TIKET',
            'jumlah' => $jumlah,
            'datas' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBuktiPembayaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuktiPembayaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuktiPembayaran  $buktiPembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(BuktiPembayaran $buktiPembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuktiPembayaran  $buktiPembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(BuktiPembayaran $buktiPembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBuktiPembayaranRequest  $request
     * @param  \App\Models\BuktiPembayaran  $buktiPembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBuktiPembayaranRequest $request, BuktiPembayaran $buktiPembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuktiPembayaran  $buktiPembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuktiPembayaran $buktiPembayaran)
    {
        //
    }
}
