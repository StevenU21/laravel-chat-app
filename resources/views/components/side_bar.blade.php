<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="/dashboard">
            <img src="{{ asset('img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                    aria-labelledby="navbar-default_dropdown_1">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('img/theme/team-1-800x800.jpg') }}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Bienvenido!</h6>
                    </div>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>Mi Perfil</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>Notificaciones</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="#">
                            <img src="{{ asset('img/brand/blue.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <hr class="my-3">
            <ul class="navbar-nav">
                <li class="nav-item  active ">
                    <a class="nav-link  active " href="/dashboard">
                        <i class="ni ni-tv-2 text-primary"></i> Panel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('explore') }}">
                        <i class="ni ni-pin-3 text-green"></i> Explorar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('conversations') }}">
                        <i class="ni ni-chat-round text-blue"></i> Conversaciones
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="ni ni-bell-55 text-orange"></i> Notificaciones
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="ni ni-single-02 text-black"></i> Perfil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-button-power text-info"></i> Cerrar Sesión
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
        </div>
    </div>
</nav>
