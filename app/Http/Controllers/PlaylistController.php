<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlist = Playlist::all();
        $user = Auth::user();
        return view('backEnd.playlist.index',[
            'playlist' => $playlist,
            'title' => 'Playlist Vidio Terbaru',
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('backEnd.playlist.create',[
            'title' => 'Tambah Playlist Vidio Terbaru',
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_playlist' => 'required|min:4',
            'gambar_playlist' => 'required|mimes:png,jpg,jpeg,gif,bmp'
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul_playlist);
        $data['user_id'] = Auth::id();
        $data['gambar_playlist'] = $request->file('gambar_playlist')->store('playlist');
        Playlist::create($data);
        Alert::success('Berhasil', 'Data Berhasil Disimpan');
        return redirect()->route('playlist.index');
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
        $user = Auth::user();
        return view('backEnd.playlist.edit',[
            'playlist' => $playlist,
            'title' => 'Edit Playlist Terbaru',
            'user' => $user
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
            Alert::info('Berhasil', 'Data Berhasil di Update');
            return redirect()->route('playlist.index');
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
            Alert::info('Berhasil', 'Data Berhasil di Update');
            return redirect()->route('playlist.index');
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
        Alert::error('Berhasil', 'Data Berhasil di Hapus');
        return redirect()->route('playlist.index');
    }
}
