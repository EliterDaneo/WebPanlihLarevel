@extends('layouts.main')

@section('content')
    <div class="page-inner mt--6">
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">{{ $title }}</div>
                            <a href="{{ route('kategori.index') }}" class="btn btn-primary btn-sm ml-auto">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" name="nama_kategori"
                                            class="form-control
                                        @error('nama_kategori')
                                          is_invalid
                                        @enderror"
                                            id="text" placeholder="Mansukan Kategori"
                                            value="{{ $kategori->nama_kategori }}" autofocus>
                                        @error('nama_kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm" type="submit">Simpan</button>
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
