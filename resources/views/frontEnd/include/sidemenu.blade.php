<div class="col-md-4">

    <!-- agenda section -->
    <div class="title mb-4">
        <h4><i class="fa fa-calendar" aria-hidden="true"></i> AGENDA TERBARU</h4>
    </div>

    <div class="card mb-3 shadow-sm border-0">
        <div class="card-body">
            <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h6>
            <hr>
            <div>
                <i class="fa fa-map-marker" aria-hidden="true"></i> Aula Sekolah
            </div>
            <div class="mt-2">
                <i class="fa fa-calendar" aria-hidden="true"></i> 20 Juli 2020
            </div>
        </div>
    </div>

    <div class="card mb-3 shadow-sm border-0">
        <div class="card-body">
            <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h6>
            <hr>
            <div>
                <i class="fa fa-map-marker" aria-hidden="true"></i> Aula Sekolah
            </div>
            <div class="mt-2">
                <i class="fa fa-calendar" aria-hidden="true"></i> 20 Juli 2020
            </div>
        </div>
    </div>

    <div class="card mb-3 shadow-sm border-0">
        <div class="card-body">
            <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h6>
            <hr>
            <div>
                <i class="fa fa-map-marker" aria-hidden="true"></i> Aula Sekolah
            </div>
            <div class="mt-2">
                <i class="fa fa-calendar" aria-hidden="true"></i> 20 Juli 2020
            </div>
        </div>
    </div>

    <!-- end agenda section -->

    <!-- kategori section -->
    <div class="title mb-4 mt-5">
        <h4><i class="fa fa-folder" aria-hidden="true"></i> KATEGORI BERITA</h4>
    </div>

    <div class="list-group">
        @foreach ($kategori as $kat)
            <a href="" class="list-group-item list-group-item-action border-0 shadow-sm mb-2 rounded"><i
                    class="fa fa-folder-open" aria-hidden="true"></i> {{ $kat->nama_kategori }}</a>
        @endforeach
    </div>
    <!-- end kategori section -->

</div>
