@extends('layouts.main')

@section('content')
    <div class="page-inner mt--6">
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">{{ $title }}</div>
                            <a href="{{ route('artikel.index') }}" class="btn btn-primary btn-sm ml-auto">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <form action="{{ route('artikel.update', $artikel->id) }}" method="POST"
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
                                            id="text" placeholder="Mansukan Judul" value="{{ $artikel->judul }}"
                                            autofocus>
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Isi Artikel</label>
                                        <textarea type="text" name="body"
                                            class="form-control
                                        @error('body')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Isi Artikel">{{ $artikel->body }}
                                        </textarea>
                                        @error('body')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <select type="text" name="kategori_id"
                                            class="form-control
                                        @error('kategori_id')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Nama Artikel Katagori">
                                            @foreach ($kategori as $row)
                                                @if ($row->id == $artikel->kategori_id)
                                                    <option value={{ $row->id }} selected='selected'>
                                                        {{ $row->nama_kategori }}</option>
                                                @else
                                                    <option value="">-- Pilih Kategori --</option>
                                                    <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select type="file" name="is_active"
                                            class="form-control
                                        @error('is_active')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Mansukan Kategori">
                                            <option value="1" {{ $artikel->is_active == '1' ? 'selected' : '' }}>
                                                Publish</option>
                                            <option value="0" {{ $artikel->is_active == '0' ? 'selected' : '' }}>Draft
                                            </option>
                                        </select>
                                        @error('is_active')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar Artikel</label>
                                        <input type="file" name="gambar_artikel"
                                            class="form-control
                                        @error('gambar_artikel')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Mansukan Kategori">
                                        <br>
                                        <label>Gambar Saat Ini :</label><br>
                                        <img src="{{ asset('uploads/' . $artikel->gambar_artikel) }}" width="100">
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
