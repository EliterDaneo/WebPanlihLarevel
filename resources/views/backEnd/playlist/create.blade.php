@extends('layouts.main')

@section('content')
    <div class="page-inner mt--6">
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">{{ $title }}</div>
                            <a href="{{ route('playlist.index') }}" class="btn btn-primary btn-sm ml-auto">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <form action="{{ route('playlist.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Playlis Vidio</label>
                                        <input type="text" name="judul_playlist"
                                            class="form-control
                                        @error('judul_playlist')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Mansukan Playlist Vidio" autofocus>
                                        @error('judul_playlist')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Diskripsi Vidio</label>
                                        <textarea type="text" name="diskripsi"
                                            class="form-control
                                        @error('diskripsi')
                                          is_invalid
                                        @enderror"
                                            id="editor" placeholder="Mansukan Diskripsi Vidio">
                                        </textarea>
                                        @error('diskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar Playlsit</label>
                                        <input type="file" name="gambar_playlist"
                                            class="form-control
                                        @error('gambar_playlist')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Mansukan Gambar Playlist">
                                        @error('gambar_playlist')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select type="file" name="is_active"
                                            class="form-control
                                        @error('is_active')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Mansukan Kategori">
                                            <option value="1">Publish</option>
                                            <option value="0">Draft</option>
                                        </select>
                                        @error('is_active')
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
