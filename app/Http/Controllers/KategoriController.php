<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('backEnd.kategori.index',[
            'kategori' => $kategori,
            'title' => 'Data Artikel Terbaru'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.kategori.create',[
            'title' => 'Tambah Data Artikel Terbaru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:4'
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data Berhasil di Simpan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('backEnd.kategori.edit',[
            'title' => 'Edit Data Artikel',
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);
        $kategori = Kategori::findOrFail($id);
        $kategori->update($data);
        return redirect()->route('kategori.index')->with('success', 'Data Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data Berhasil di Dihapus!');
    }
}
