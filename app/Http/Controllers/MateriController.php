<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::all();
        return view('backEnd.materi.index',[
            'materi' => $materi,
            'title' => 'Materi Vidio Terbaru'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $playlist = Playlist::all();
        return view('backEnd.materi.create',[
            'playlist' => $playlist,
            'title' => 'Tambah Materi Vidio Terbaru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_materi' => 'required|min:4'
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul_materi);
        $data['gambar_materi'] = $request->file('gambar_materi')->store('materi');
        Materi::create($data);
        return redirect()->route('materi.index')->with('success', 'Data Berhasil di Simpan!');
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
        $materi = Materi::find($id);
        $playlist = Playlist::all();
        return view('backEnd.materi.edit',[
            'materi' => $materi,
            'playlist' => $playlist,
            'title' => 'Edit Playlist Terbaru'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(empty($request->file('gambar_materi'))){
            $materi = Materi::find($id);
            $materi->update([
                'judul_materi' => $request->judul_materi,
                'diskripsi' => $request->diskripsi,
                'slug' => Str::slug($request->judul_materi),
                'link' => $request->link,
                'playlis_id' => $request->playlist_id,
                'is_active' => $request->is_active,
            ]);
            return redirect()->route('materi.index')->with('success', 'Data Berhasil di Simpan!');
        }else{
            $materi = Materi::find($id);
            Storage::delete($materi->gambar_materi);
            $materi->update([
                'judul_materi' => $request->judul_materi,
                'diskripsi' => $request->diskripsi,
                'slug' => Str::slug($request->judul_materi),
                'link' => $request->link,
                'playlis_id' => $request->playlist_id,
                'is_active' => $request->is_active,
                'gambar_materi' => $request->file('gambar_materi')->store('materi'),
            ]);
            return redirect()->route('materi.index')->with('success', 'Data Berhasil di Simpan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Materi::find($id);
        Storage::delete($materi->gambar_materi);
        $materi->delete();
        return redirect()->route('materi.index')->with('success', 'Data Berhasil di Dihapus!');
    }
}
