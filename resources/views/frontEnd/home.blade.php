@extends('frontEnd.layouts.main')

@section('content')
    <div class="row">

        <!-- berita section -->
        <div class="col-md-12 mb-3">
            <h4><i class="fas fa-book-open"></i> Materi Terbaru</h4>
        </div>

        @foreach ($materi as $mat)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-lg">
                    <div class="card-img">
                        <img src="{{ asset('uploads/' . $mat->gambar_materi) }}" class="w-100"
                            style="height: 200px;object-fit: cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                    </div>
                    <div class="card-body">
                        <a href="{{ url('detail-materi/' . $mat->slug) }}" class="text-dark text-decoration-none">
                            <h6>{{ $mat->diskripsi }}</h6>
                        </a>
                    </div>
                    <div class="card-footer bg-white">
                        <i class="fa fa-calendar" aria-hidden="true"></i> {{ $mat->created_at }}
                    </div>
                </div>
            </div>
        @endforeach

        <div class="d-flex align-items-center justify-content-center">
            <a class="btn btn-primary center" href="#">Lihat Semua ..</a>
        </div>
        <!-- end berita section -->

        <!-- foto section -->
        <div class="col-md-12 mb-3 mt-4">
            <h4><i class="fas fa-images"></i> FOTO TERBARU</h4>
        </div>


        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-lg">
                <div class="card-img">
                    <img src="{{ asset('frontEnd') }}/images/post_image.png" class="w-100"
                        style="height: 200px;object-fit: cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                </div>
                <div class="card-body">
                    <a href="http://" class="text-dark text-decoration-none">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h6>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-lg">
                <div class="card-img">
                    <img src="{{ asset('frontEnd') }}/images/post_image.png" class="w-100"
                        style="height: 200px;object-fit: cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                </div>
                <div class="card-body">
                    <a href="http://" class="text-dark text-decoration-none">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h6>
                    </a>
                </div>
            </div>
        </div>
        <!-- send foto section -->

        <!-- video section -->
        <div class="col-md-12 mb-3 mt-4">
            <h4><i class="fas fa-video"></i> VIDEO TERBARU</h4>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-lg">
                <div class="card-img">
                    <img src="{{ asset('frontEnd') }}/images/post_image.png" class="w-100"
                        style="height: 200px;object-fit: cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                </div>
                <div class="card-body">
                    <a href="http://" class="text-dark text-decoration-none">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h6>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-lg">
                <div class="card-img">
                    <img src="{{ asset('frontEnd') }}/images/post_image.png" class="w-100"
                        style="height: 200px;object-fit: cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                </div>
                <div class="card-body">
                    <a href="http://" class="text-dark text-decoration-none">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h6>
                    </a>
                </div>
            </div>
        </div>

        <!-- end video section -->

    </div>
@endsection
