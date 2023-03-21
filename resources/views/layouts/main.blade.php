@include('include.head')

<body data-background-color="dark">
    <div class="wrapper">
        @include('include.navbar')

        <!-- Sidebar -->
        @include('include.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
            {{-- footer --}}
            @include('include.footer')
        </div>
    </div>
    {{-- js --}}
    @include('include.js')
</body>

</html>
