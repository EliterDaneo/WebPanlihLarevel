<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $kategori =  Kategori::all();
        return view('frontEnd.home',[
            'title' => 'Website Panlih Wonosobo',
            'kategori' => $kategori
        ]);
    }
}
