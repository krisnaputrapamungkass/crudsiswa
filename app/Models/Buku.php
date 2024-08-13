<?php

namespace App\Models;

use App\Http\Controllers\PeminjamController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_buku',
        'tahun_terbit',
        'isbn',
        'id_penulis',
        'genre',
        'tempat_terbit',
        'penerbit',
        'sampul'
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis','id');
    }
    public function peminjaman()
    {
        return $this->hasMany(PeminjamController::class, 'id','id_buku');
    }

}
