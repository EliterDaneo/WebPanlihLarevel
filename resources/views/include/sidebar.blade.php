<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('backEnd') }}/img/profile.jpg" alt="{{ asset('backEnd') }}."
                        class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('kategori.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-book"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('artikel.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-book-open"></i>
                        <p>Arikel</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('playlist.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-music"></i>
                        <p>Playlist</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('materi.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-file-video"></i>
                        <p>Materi vidio</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
