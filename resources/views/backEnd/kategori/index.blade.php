@extends('layouts.main')

@section('content')
    <div class="page-inner mt--6">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">{{ $title }}</div>
                            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm ml-auto">Tambah Artikel</a>
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
                                        <th>Id Kategori</th>
                                        <th>Nama Kategori</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @forelse ($kategori as $row)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>{{ $row->slug }}</td>
                                            <td>
                                                <a href="{{ route('kategori.edit', $row->id) }}"
                                                    class="btn btn-secondary btn-sm" title="Edit Page"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('kategori.destroy', $row->id) }}" method="POST"
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
