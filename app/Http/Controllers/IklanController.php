<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iklan = Iklan::all();
        return view('backEnd.iklan.index',[
            'iklan' => $iklan,
            'title' => 'Iklan Terbaru'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $iklan = Iklan::all();
        return view('backEnd.iklan.create',[
            'iklan' => $iklan,
            'title' => 'Tambah Iklan Terbaru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'judul' => 'required|min:4',
            'gambar_iklan' => 'required|mimes:png,jpg,jpeg,gif,bmp'
        ]);
        if(!empty($request->file('gambar_iklan'))){
            $data = $request->all();
            $data['gambar_iklan'] = $request->file('gambar_iklan')->store('iklan');
            Iklan::create($data);
            Alert::info('Berhasil', 'Data Berhasil di Update');
            return redirect()->route('iklan.index');
        }else {
            $data = $request->all();
            Iklan::create($data);
            Alert::info('Berhasil', 'Data Berhasil di Update');
            return redirect()->route('iklan.index');
        }
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
        $iklan = Iklan::find($id);
        return view('backEnd.iklan.edit',[
            'iklan' => $iklan,
            'title' => 'Edit Iklan Terbaru'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(empty($request->file('gambar_iklan'))){
            $iklan = Iklan::find($id);
            $iklan->update([
                'judul' => $request->judul,
                'link' => $request->link,
                'status' => $request->status,
            ]);
            Alert::info('Berhasil', 'Data Berhasil di Update');
            return redirect()->route('iklan.index');
        }else{
            $iklan = Iklan::find($id);
            Storage::delete($iklan->gambar_iklan);
            $iklan->update([
                'judul' => $request->judul,
                'link' => $request->link,
                'status' => $request->status,
                'gambar_iklan' => $request->file('gambar_iklan')->store('iklan'),
            ]);
            Alert::info('Berhasil', 'Data Berhasil di Update');
            return redirect()->route('iklan.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $iklan = Iklan::find($id);
        Storage::delete($iklan->gambar_iklan);
        $iklan->delete();
        Alert::error('Berhasil', 'Data Berhasil di Hapus');
        return redirect()->route('iklan.index');
    }
}
