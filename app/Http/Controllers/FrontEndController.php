<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Materi;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $kategori =  Kategori::all();
        $slider = Slider::all();
        $materi = Materi::all();
        return view('frontEnd.home',[
            'title' => 'Website Panlih Wonosobo',
            'kategori' => $kategori,
            'slider' => $slider,
            'materi' => $materi,
        ]);
    }

    public function detail($slug)
    {
        $kategori =  Kategori::all();
        $slider = Slider::all();
        $materi = Materi::where('slug', $slug)->first();
        return view('frontEnd.materi.detail_materi',[
            'title' => 'Detail Materi Berita',
            'tag1' => 'Materi yang disediakan Oleh Muhammadiyah',
            'tag2' => 'materi',
            'materi' => $materi,
            'kategori' => $kategori,
            'slider' => $slider,
        ]);
    }
}
