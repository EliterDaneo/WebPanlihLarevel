<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::all();
        return view('backEnd.slider.index',[
            'slider' => $slider,
            'title' => 'Slider Terbaru'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $slider = Slider::all();
        return view('backEnd.slider.create',[
            'slider' => $slider,
            'title' => 'Tambah Slider Terbaru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_slider' => 'required|min:4',
            'gambar_slider' => 'required|mimes:png,jpg,jpeg,gif,bmp'
        ]);
        if(!empty($request->file('gambar_slider'))){
            $data = $request->all();
            $data['gambar_slider'] = $request->file('gambar_slider')->store('slider');
            Slider::create($data);
            Alert::success('Berhasil', 'Data Berhasil di Tambah');
            return redirect()->route('slider.index');
        }else {
            $data = $request->all();
            Slider::create($data);
            Alert::success('Berhasil', 'Data Berhasil di Tambah');
            return redirect()->route('slider.index');
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
        $slider = Slider::find($id);
        return view('backEnd.slider.edit',[
            'slider' => $slider,
            'title' => 'Edit Slider Terbaru'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(empty($request->file('gambar_slider'))){
            $slider = Slider::find($id);
            $slider->update([
                'judul_slider' => $request->judul_slider,
                'link' => $request->link,
                'status' => $request->status,
            ]);
            Alert::info('Berhasil', 'Data Berhasil di Update');
            return redirect()->route('Slider.index')->with('success', 'Data Berhasil di Simpan!');
        }else{
            $slider = Slider::find($id);
            Storage::delete($slider->gambar_slider);
            $slider->update([
                'judul_slider' => $request->judul_slider,
                'link' => $request->link,
                'status' => $request->status,
                'gambar_slider' => $request->file('gambar_slider')->store('slider'),
            ]);
            Alert::info('Berhasil', 'Data Berhasil di Update');
            return redirect()->route('slider.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        Storage::delete($slider->gambar_slider);
        $slider->delete();
        Alert::error('Berhasil', 'Data Berhasil di Dihapus');
        return redirect()->route('slider.index');
    }
}
