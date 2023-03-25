<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src="{{ asset('backEnd') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('uploads/profile/' . $user->image) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ $user->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if ($user->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kategori.index') }}" class="nav-link">
                            <i class="fas fa-book"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('artikel.index') }}" class="nav-link">
                            <i class="fas fa-book-open"></i>
                            <p>Arikel</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('playlist.index') }}" class="nav-link">
                            <i class="fas fa-music"></i>
                            <p>Playlist</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('materi.index') }}" class="nav-link">
                            <i class="fas fa-file-video"></i>
                            <p>Materi vidio</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('slider.index') }}" class="nav-link">
                            <i class="fas fa-sliders-h"></i>
                            <p>Slider vidio</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('iklan.index') }}" class="nav-link">
                            <i class="far fa-money-bill-alt"></i>
                            <p>Iklan</p>
                        </a>
                    </li>
                    <li class="nav-header">Settings</li>
                    <li class="nav-item ">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="fas fa-users"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li class="nav-header">See You</li>
                    <li class="nav-item">
                        <a href="#" data-toggle="modal" data-target="#modal-default" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </li>
                @elseif ($user->role == 'user')
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


{{-- modal Log Out --}}
<div class="card card-danger card-outline">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Logout Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda YAkin Ingin Keluar Dari Sistem??</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>


{{-- detail --}}
@foreach ($artikel as $row)
    <div class="card card-primary card-outline">
        <div class="modal fade" id="modal-detail{{ $row->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul Artikel</label>
                                <input type="text" class="form-control" value="{{ $row->judul }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Slug Artikel</label>
                                <input type="text" class="form-control" value="{{ $row->slug }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Diskripsi Artikel</label>
                                <input type="text" class="form-control" value="{{ $row->body }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kategori Artikel</label>
                                <input type="text" class="form-control"
                                    value="{{ $row->kategori->nama_kategori }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Publisher</label>
                                <input type="text" class="form-control" value="{{ $row->users->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status Artikel</label>
                                <br>
                                @if ($row->is_active == '1')
                                    <div class="btn btn-success btn-sm">Active</div>
                                @else
                                    <div class="btn btn-danger btn-sm">Daft</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Views Artikel</label>
                                <input type="text" class="form-control" value="{{ $row->views }}" readonly>
                            </div>
                            <div class="form-group"><br>
                                <label>Gambar Artikel</label>
                                <img src="{{ asset('uploads/' . $row->gambar_artikel) }}" width="100">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
    </div>
@endforeach
