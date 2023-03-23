<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::all();
        $user = Auth::user();
        return view('backEnd.artikel.index',[
            'artikel' => $artikel,
            'title' => 'Data Artikel Terbaru',
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artikel = Artikel::all();
        $kategori = Kategori::all();
        $user = Auth::user();
        return view('backEnd.artikel.create',[
            'artikel' => $artikel,
            'kategori' => $kategori,
            'title' => 'Data Artikel Terbaru',
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:4',
            'gambar_artikel' => 'required|mimes:png,jpg,jpeg,gif,bmp'
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['gambar_artikel'] = $request->file('gambar_artikel')->store('artikel');
        Artikel::create($data);
        Alert::success('Berhasil', 'Data Berhasil di Simpan');
        return redirect()->route('artikel.index');
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
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();
        $user = Auth::user();
        return view('backEnd.artikel.edit',[
            'artikel' => $artikel,
            'kategori' => $kategori,
            'title' => 'Edit Artikel Terbaru',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(empty($request->file('gambar_artikel'))){
            $artikel = Artikel::find($id);
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
            ]);
            Alert::info('Berhasil', 'Data Berhasil di Update');
            return redirect()->route('artikel.index');
        }else{
            $artikel = Artikel::find($id);
            Storage::delete($artikel->gambar_artikel);
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'gambar_artikel' => $request->file('gambar_artikel')->store('artikel'),
            ]);
            Alert::info('Berhasil', 'Data Berhasil di Update');
            return redirect()->route('artikel.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::find($id);
        Storage::delete($artikel->gambar_artikel);
        $artikel->delete();
        Alert::error('Berhasil', 'Data Berhasil di Hapus');
        return redirect()->route('artikel.index');
    }
}
