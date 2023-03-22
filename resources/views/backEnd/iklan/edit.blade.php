@extends('layouts.main')

@section('content')
    <div class="page-inner mt--6">
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">{{ $title }}</div>
                            <a href="{{ route('iklan.index') }}" class="btn btn-primary btn-sm ml-auto">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <form action="{{ route('iklan.update', $iklan->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" name="judul"
                                            class="form-control
                                        @error('judul')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Masukan Judul Vidio" value="{{ $iklan->judul }}"
                                            autofocus>
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Link Vidio</label>
                                        <input type="text" name="link"
                                            class="form-control
                                        @error('link')
                                          is_invalid
                                        @enderror"
                                            placeholder="Mansukan Kategori" value="{{ $iklan->link }}">
                                        @error('link')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tumnile</label>
                                        <input type="file" name="gambar_iklan"
                                            class="form-control
                                        @error('gambar_iklan')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Mansukan Kategori"><br>
                                        <label>Gambar Saat Ini :</label><br>
                                        <img src="{{ asset('uploads/' . $iklan->gambar_iklan) }}" width="100">
                                        @error('gambar_iklan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select type="text" name="status"
                                            class="form-control
                                        @error('status')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Mansukan Kategori">
                                            <option value="1" {{ $iklan->status == '1' ? 'selected' : '' }}>
                                                Publish</option>
                                            <option value="0" {{ $iklan->status == '0' ? 'selected' : '' }}>Draft
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                        <button class="btn btn-danger btn-sm" type="reset">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
