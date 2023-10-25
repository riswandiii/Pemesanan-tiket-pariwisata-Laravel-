<?php

namespace App\Http\Controllers;

use App\Models\BuktiPembayaran;
use App\Models\Parawisata;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PemesananController extends Controller
{


    //Function untuk menampilkan view pemesanan tiket
    public function index($id)
    {
        $pariwisata = Parawisata::where('id', $id)->first();
        return view('pemesanan.pesan', [
            'title' => 'PEMESANAN E-TIKET',
            'pariwisata' => $pariwisata
        ]);
    }

    // Function untuk proses pemesanan tiket
    public function pesan(Request $request, $id)
    {
        $pariwisata = Parawisata::where('id', $id)->first();
        $tanggal = Carbon::now();
        
        // Table pesanan
        // Cek user apakah sudah ada dalam tabel pesanan
        $cekUser = Pesanan::where('user_id', auth()->user()->id)->first();
        if(empty($cekUser)){
            $create = [
                'user_id' => auth()->user()->id,
                'tanggal_pesanan' => $tanggal,
                'total_harga' => $request->jumlah * $pariwisata->harga,
                'status_pesanan' => '0'
            ];
            Pesanan::create($create);
        }else{
            $update = [
                'tanggal_pesanan' => $tanggal,
                'total_harga' => $cekUser->total_harga + $pariwisata->harga * $request->jumlah
            ];
            Pesanan::where('id', $cekUser->id)->update($update);
        }


        // Table pemesananDetail
        $cekUser = Pesanan::where('user_id', auth()->user()->id)->first();
        $pesananDetail = PesananDetail::where('parawisata_id', $pariwisata->id)->where('pesanan_id', $cekUser->id)->first();
        if(empty($pesananDetail)){
            $create= [
                'pesanan_id' => $cekUser->id,
                'parawisata_id' => $pariwisata->id,
                'jumlah' => $request->jumlah,
                'harga' => $pariwisata->harga * $request->jumlah,
                'status' => '0'
            ];
            PesananDetail::create($create);
        }else{
            $edit = [
                'jumlah' => $pesananDetail->jumlah + $request->jumlah,
                'harga' => $pesananDetail->harga + $pariwisata->harga * $request->jumlah
            ];
            PesananDetail::where('id', $pesananDetail->id)->update($edit);
        }
        return redirect('/keranjang/' . $cekUser->id)->with('success', 'Order successfully added to cart!');
    }


    // Function untuk menampilkan keranjang 
    public function keranjang($id)
    {
        $user = auth()->user()->username;
        $pesanan = Pesanan::where('id', $id)->first();
        $pesananDetail = PesananDetail::where('pesanan_id', $id)->where('status', '0')->get();
        $jumlah = $pesananDetail->count();
        return view('pemesanan.keranjang', [
            'title' => 'PARIWISATA E-TIKET',
            'pesananDetails' => $pesananDetail,
            'pesanan' => $pesanan,
            'user' => $user,
            'jumlah' => $jumlah
        ]);
    }

    // Function untuk delete pesanan
    public function deletePesanan($id)
    {
        $pesananDetail = PesananDetail::where('id', $id)->first();

        // Update table pesanan
        $pesanan = Pesanan::where('id', $pesananDetail->pesanan_id)->first();
        $update = [
            'user_id' => $pesanan->user_id,
            'tanggal_pesanan' => $pesanan->tanggal_pesanan,
            'total_harga' => $pesanan->total_harga - $pesananDetail->harga,
            'status_pesanan' => $pesanan->status_pesanan
        ];
        Pesanan::where('id', $pesanan->id)->update($update);

        // hapus pesanan detail
        PesananDetail::destroy('id', $pesananDetail->id);
        return redirect('/keranjang/' . $pesanan->id)->with('success', 'Your order has been successfully deleted!');
    }

    // Function untuk menampilkan view checkout
    public function viewCheckout($id)
    {
        $pesananDetail = PesananDetail::where('id', $id)->first();
        return view('pemesanan.viewCheckout', [
            'title' => 'PARIWISATA E-TIKET',
            'pesananDetail' => $pesananDetail
        ]);
    }

    // Function untuk proses checkout
    public function checkout($id)
    {
        $pesananDetail = PesananDetail::where('id', $id)->first();
        $update = [
            'status' => 1
        ];
        PesananDetail::where('id', $pesananDetail->id)->update($update);
        
        $detailPesanan = PesananDetail::where('pesanan_id', $pesananDetail->pesanan_id)->where('status', 1)->get();
        return view('pemesanan.history', [
            'title' => 'PARIWISATA E-TIKET',
            'user' => auth()->user()->username,
            'detailPesanan' => $detailPesanan
        ])->with('success', 'Checkout was successful!');
    }

    // Funtion untuk menampilkan view history pemesanan
    public function history($id)
    {
        $pesanan = Pesanan::where('user_id', $id)->first();
        if(!empty($pesanan)){
            $detailPesanan = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            $jumlah = $detailPesanan->count();
        }
        
        if(!empty($detailPesanan)){
            return view('pemesanan.history', [
                'title' => 'PARIWISATA E-TIKET',
                'user' => auth()->user()->username,
                'detailPesanan' => $detailPesanan,
                'jumlah' => $jumlah
            ]);
        }else{
            return view('pemesanan.history', [
                'title' => 'PARIWISATA E-TIKET',
                'user' => auth()->user()->username,
                'detailPesanan' => $detailPesanan,
                'jumlah' => $jumlah
            ]);
        }

    }

    // Function untuk proses upload bukti tf
    public function uploadBuktiTf(Request $request){
        $detailPesanan = PesananDetail::where('id', $request->pesanan_detail_id)->first();
        $pesananDetailUpdate = [
            'status' => 2
        ];
        PesananDetail::where('id', $detailPesanan->id)->update($pesananDetailUpdate);

        $validateData = $request->validate([
            'pesanan_detail_id' => ['required'],
            'image' => 'file|file|max:1024|required'
        ]);
        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('post-image');
        }
        BuktiPembayaran::create($validateData);
        return redirect('/checkout-pesanan/' . $request->pesanan_detail_id)->with('success', 'Upload proof of payment is successful!');
    }

}
