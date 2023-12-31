<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasi ketabel pesanaDetail
    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class);
    }

}
