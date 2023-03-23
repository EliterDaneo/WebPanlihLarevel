<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        $user = Auth::user();
        return view('backEnd.kategori.index',[
            'kategori' => $kategori,
            'title' => 'Data Artikel Terbaru',
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $user = Auth::user();
        return view('backEnd.kategori.create',[
            'title' => 'Tambah Data Artikel Terbaru',
            'kategori' => $kategori,
            'user' => $user
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
        Alert::success('Berhasil', 'Data Berhasil Disimpan');
        return redirect()->route('kategori.index');

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
        $user = Auth::user();
        return view('backEnd.kategori.edit',[
            'title' => 'Edit Data Artikel',
            'kategori' => $kategori,
            'user' => $user
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
        Alert::info('Berhasil', 'Data Berhasil di Update');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        Alert::error('Berhasil', 'Data Berhasil di Dihapus');
        return redirect()->route('kategori.index');
    }
}
