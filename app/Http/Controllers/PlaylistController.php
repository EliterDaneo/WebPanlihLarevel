<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlist = Playlist::all();
        return view('backEnd.playlist.index',[
            'playlist' => $playlist,
            'title' => 'Playlist Vidio Terbaru'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.playlist.create',[
            'title' => 'Tambah Playlist Vidio Terbaru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_playlist' => 'required|min:4'
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul_playlist);
        $data['user_id'] = Auth::id();
        $data['gambar_playlist'] = $request->file('gambar_playlist')->store('playlist');
        Playlist::create($data);
        return redirect()->route('playlist.index')->with('success', 'Data Berhasil di Simpan!');
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
        $playlist = Playlist::find($id);
        return view('backEnd.playlist.edit',[
            'playlist' => $playlist,
            'title' => 'Edit Playlist Terbaru'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(empty($request->file('gambar_playlist'))){
            $playlist = playlist::find($id);
            $playlist->update([
                'judul_playlist' => $request->judul_playlist,
                'diskripsi' => $request->diskripsi,
                'slug' => Str::slug($request->judul_playlist),
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
            ]);
            return redirect()->route('playlist.index')->with('success', 'Data Berhasil di Simpan!');
        }else{
            $playlist = Playlist::find($id);
            Storage::delete($playlist->gambar_playlist);
            $playlist->update([
                'judul_playlist' => $request->judul_playlist,
                'diskripsi' => $request->diskripsi,
                'slug' => Str::slug($request->judul_playlist),
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'gambar_playlist' => $request->file('gambar_playlist')->store('playlist'),
            ]);
            return redirect()->route('playlist.index')->with('success', 'Data Berhasil di Simpan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $playlist = Playlist::find($id);
        Storage::delete($playlist->gambar_playlist);
        $playlist->delete();
        return redirect()->route('playlist.index')->with('success', 'Data Berhasil di Dihapus!');
    }
}
