<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // relasi ke tabel pesanan details
    public function pesananDetail()
    {
        return $this->belongsTo(PesananDetail::class);
    }

}
