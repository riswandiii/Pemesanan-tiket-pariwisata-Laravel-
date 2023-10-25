<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Param;

class Like extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi ketabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasi ke tabel pariwisata
    public function parawisata()
    {
        return $this->belongsTo(parawisata::class);
    }

}
