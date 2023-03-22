<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontEnd') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd') }}/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd') }}/css/styles.css">
    <title>{{ $title }}</title>
</head>

<body style="background:#e2e8f0">

    @include('frontEnd.include.header')

    <!-- slider section -->
    @include('frontEnd.include.slider')
    <!-- end slider section -->

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
