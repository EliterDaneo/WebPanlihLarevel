@extends('layouts.main')

@section('content')
    <div class="page-inner mt--6">
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">{{ $title }}</div>
                            <a href="{{ route('materi.index') }}" class="btn btn-primary btn-sm ml-auto">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <form action="{{ route('materi.update', $materi->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Materi Vidio</label>
                                        <input type="text" name="judul_materi"
                                            class="form-control
                                        @error('judul_materi')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Masukan Judul Materi Vidio"
                                            value="{{ $materi->judul_materi }}" autofocus>
                                        @error('judul_materi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Isi Materi Vidio</label>
                                        <textarea type="text" name="diskripsi"
                                            class="form-control
                                        @error('diskripsi')
                                          is_invalid
                                        @enderror"
                                            id="summernote" placeholder="Mansukan Kategori">{{ $materi->diskripsi }}
                                        </textarea>
                                        @error('diskripsi')
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
                                            value="{{ $materi->link }}" placeholder="Mansukan Kategori">
                                        @error('link')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Playlist</label>
                                        <select type="text" name="playlist_id"
                                            class="form-control
                                        @error('playlist_id')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Nama Plyalist">
                                            @foreach ($playlist as $row)
                                                @if ($row->id == $materi->materi_id)
                                                    <option value={{ $row->id }} selected='selected'>
                                                        {{ $row->judul_playlist }}</option>
                                                @else
                                                    <option value="{{ $row->id }}">{{ $row->judul_playlist }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tumnile</label>
                                        <input type="file" name="gambar_materi"
                                            class="form-control
                                        @error('gambar_materi')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Mansukan Kategori">
                                        <br>
                                        <label>Gambar Saat Ini :</label><br>
                                        <img src="{{ asset('uploads/' . $materi->gambar_materi) }}" width="100">
                                        @error('gambar_materi')
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
                                            <option value="1" {{ $materi->is_active == '1' ? 'selected' : '' }}>
                                                Publish</option>
                                            <option value="0" {{ $materi->is_active == '0' ? 'selected' : '' }}>Draft
                                            </option>
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
