<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <link rel="stylesheet" href="{{ asset('frontEnd') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd') }}/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd') }}/css/styles.css">
    <title>Home Sekolah</title>
</head>

<body style="background:#e2e8f0">
    @include('frontEnd.include.header')
    <header class="pt-5 border-bottom bg-light">
        <div class="container pt-md-1 pb-md-1">
            <h1 class="bd-title mt-4 font-weight-bold"><i class="fas fa-book-open" aria-hidden="true"></i>
                {{ $title }}
            </h1>
            <p class="bd-lead">{{ $tag1 }}</p>
        </div>
    </header>
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a hre="#" class="text-decoration-none"><i class="fa fahome"></i> Home
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none"><i class="fa fa-book-open"></i>
                    {{ $tag2 }}</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="#" class="text-decoration-none">
                    {{ $materi->judul_materi }}</a>
            </li>
        </ol>
    </nav>
    <!-- end breadcrumb -->
    <div class="container-fluid mt-3 mb-5">
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>
            @include('frontEnd.include.sidemenu')
        </div>
    </div>
    @include('frontEnd.include.footer')
    @include('frontEnd.include.js')
</body>

</html>
