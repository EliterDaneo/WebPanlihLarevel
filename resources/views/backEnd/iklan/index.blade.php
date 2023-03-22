@extends('layouts.main')

@section('content')
    <div class="page-inner mt--6">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">{{ $title }}</div>
                            <a href="{{ route('iklan.create') }}" class="btn btn-primary btn-sm ml-auto">Tambah
                                Iklan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-primary" role="alert">
                                {{ Session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar Iklan</th>
                                        <th>Judul Iklan</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @forelse ($iklan as $row)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/' . $row->gambar_iklan) }}" width="100">
                                            </td>
                                            <td>{{ $row->judul }}</td>
                                            <td>{{ $row->link }}</td>
                                            <td>
                                                @if ($row->status == '1')
                                                    <div class="btn btn-success btn-sm">Active</div>
                                                @else
                                                    <div class="btn btn-danger btn-sm">Daft</div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('iklan.edit', $row->id) }}"
                                                    class="btn btn-secondary btn-sm" title="Edit Page"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('iklan.destroy', $row->id) }}" method="POST"
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
