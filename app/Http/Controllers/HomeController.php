<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Iklan;
use App\Models\Kategori;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_user = User::all()->count();
        $jumlah_aritkel = Artikel::all()->count();
        $jumlah_kategori = Kategori::all()->count();
        $jumlah_vidio = Playlist::all()->count();
        $user = Auth::user();
        $iklan = Iklan::all();
        Alert::success('Berhasil', 'Selamat Datang Users');
        return view('backEnd.dashboard', [
            'title' => 'Home Dashboard System',
            'jumlah_user' => $jumlah_user,
            'jumlah_aritkel' => $jumlah_aritkel,
            'jumlah_kategori' => $jumlah_kategori,
            'jumlah_vidio' => $jumlah_vidio,
            'user' => $user,
            'iklan' => $iklan
        ]);
    }
}
