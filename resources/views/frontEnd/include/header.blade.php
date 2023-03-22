<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="border-top: 5px solid rgb(116, 49, 216);">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> PANLIH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-book-open" aria-hidden="true"></i> BERITA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-image" aria-hidden="true"></i> GALERI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-video" aria-hidden="true"></i> VIDEO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-phone" aria-hidden="true"></i> KONTAK</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-calendar"
                            aria-hidden="true"></i>
                        Kategori
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($kategori as $kat)
                            <li><a class="dropdown-item" href="{{ $kat->slug }}">{{ $kat->nama_kategori }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
