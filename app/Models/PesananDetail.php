<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi ke tabel parawisata
    public function parawisata()
    {
        return $this->belongsTo(Parawisata::class);
    } 

    // relasi ke tabel pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    // relasi ke tabel bukti pembayaran
    public function buktiPembayaran()
    {
        return $this->belongsTo(BuktiPembayaran::class);
    }

}
