<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parawisata extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi ketabel pesanan detail
    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class);
    }

    // relasi ke tabel coment
    public function coment()
    {
        return $this->hasMany(Coment::class);
    }

    // relasi ke tabel like
    public function like()
    {
        return $this->hasMany(Like::class);
    }

}
