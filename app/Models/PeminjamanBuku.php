<?php

namespace App\Models;

use App\Http\Controllers\Siswacontroller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBuku extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_buku', 'id_siswa', 'tanggal_pinjam',
        'tanggal_kembali', 'status'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }
}
