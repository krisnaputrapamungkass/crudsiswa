<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::all();
        return view('buku.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Penulis::all();
        return view('buku.create',['penulis'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'id_penulis' => 'required',
            'genre' => 'required',
            'tempat_terbit' => 'required',
            'penerbit' => 'required',
            'sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // Menangani pengunggahan gambar
        $namaFile = time() . $request->file('sampul')->getClientOriginalName();
        $gambarPath = $request->file('sampul')->storeAs('uploads', $namaFile, 'public');
        $validasi['sampul'] = '/storage/' . $gambarPath;

        // Simpan data buku baru
        $data = Buku::create($validasi);
        return redirect('/buku')->with('success', 'berhasil menambahkan buku');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         //
         $penulis = Penulis::all();
         $data = Buku::findOrFail($id);
 
 
         return view('buku.edit', ['data' => $data, 'penulis' => $penulis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      //
      $validasi = $request->validate([
        'judul_buku',
        'tahun_terbit',
        'isbn',
        'id_penulis',
        'genre',
        'tempat_terbit',
        'penerbit',
        'sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);
// Cari data buku berdasarkan ID
$data = Buku::findOrFail($id);

// Cek apakah ada gambar baru yang diunggah
if ($request->hasFile('sampul')) {
// Hapus gambar lama jika ada
if ($data->sampul) {
 Storage::delete($data->sampul);
}

// Simpan gambar baru
$namaFile = time() . $request->file('sampul')->getClientOriginalName();
$gambarPath = $request->file('sampul')->storeAs('uploads', $namaFile, 'public');

// Update path gambar
$validasi['sampul'] = 'storage/' . $gambarPath;
}

// Update data buku
$data->update($validasi);

    return redirect('/buku')->with('success', 'berhasil menambahkan buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buku::findOrFail($id);
        $data->delete();
        return redirect('/buku')->with('success','sukses delete');
    }
} 