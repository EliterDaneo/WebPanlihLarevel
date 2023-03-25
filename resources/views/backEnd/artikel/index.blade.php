@extends('layouts.main')

@section('content')
    <div class="page-inner mt--6">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">{{ $title }}</div><br>
                            <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-sm ml-auto">Tambah Artikel</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-primary">
                                {{ Session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar Artikel</th>
                                        <th>Nama Nama Artikel</th>
                                        <th>Judul</th>
                                        <th>Slug</th>
                                        <th>Publiser</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @forelse ($artikel as $row)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/' . $row->gambar_artikel) }}" width="100">
                                            </td>
                                            <td>{{ $row->kategori->nama_kategori }}</td>
                                            <td>{{ $row->judul }}</td>
                                            <td>{{ $row->slug }}</td>
                                            <td>{{ $row->users->name }}</td>
                                            <td>
                                                <a href="{{ route('artikel.edit', $row->id) }}"
                                                    class="btn btn-secondary btn-sm" title="Edit Page"><i
                                                        class="fas fa-edit"></i></a>
                                                <a class="btn btn-primary btn-sm" title="Edit Page" data-toggle="modal"
                                                    data-target="#modal-detail{{ $row->id }}"><i
                                                        class="fas fa-eye"></i></a>
                                                <form action="{{ route('artikel.destroy', $row->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" title="Delete Page"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>Data Masih Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
