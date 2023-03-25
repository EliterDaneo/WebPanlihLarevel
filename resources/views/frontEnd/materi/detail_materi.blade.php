@extends('frontEnd.layouts.detail')

@section('content')
    <!-- berita section -->
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <h3>{{ $materi->judul_materi }}</h3>
            <hr>
            <img src="{{ asset('uploads/' . $materi->gambar_materi) }}" 50 class="w-100 rounded">
            <div class="mt-3">
                {{ $materi->diskripsi }}
            </div>
        </div>
    </div>
@endsection
