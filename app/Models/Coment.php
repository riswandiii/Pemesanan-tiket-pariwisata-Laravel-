<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    // relasi ke tabel pariwisata
    public function parawisata()
    {
        return $this->belongsTo(Parawisata::class);
    }

    // relasi ketabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
