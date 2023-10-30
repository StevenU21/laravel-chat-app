@extends('layouts.panel')
@section('title', 'Conversaciones')

@section('content')
    {{-- @livewire('chat.main') --}}
    <div class="card shadow-lg mx-4">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('img/team-1.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Celimar Castillo
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Programación
                        </p>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                    <i class="ni ni-app"></i>
                                    <span class="ms-2">App</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-email-83"></i>
                                    <span class="ms-2">Messages</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span class="ms-2">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-12">
                <div class="card blur shadow-blur max-height-vh-70 overflow-auto overflow-x-hidden mb-5 mb-lg-0">
                    <div class="card-header p-3">
                        <h6>Conversaciones</h6>
                        <input type="search" class="form-control" placeholder="Buscar Contacto" aria-label="search">
                    </div>
                    <div class="card-body p-2">
                        <a href="javascript:;" class="d-block p-2 border-radius-lg bg-gradient-primary">
                            <div class="d-flex p-2">
                                <img alt="Image" src="{{ asset('img/team-3.jpg') }}" class="avatar shadow">
                                <div class="ms-3">
                                    <div class="justify-content-between align-items-center">
                                        <h6 class="text-white mb-0">Kevin Cardenas
                                            <span class="badge badge-success"></span>
                                        </h6>
                                        <p class="text-white mb-0 text-sm">Escribiendo...</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="javascript:;" class="d-block p-2">
                            <div class="d-flex p-2">
                                <img alt="Image" src="{{ asset('img/team-4.jpg') }}" class="avatar shadow">
                                <div class="ms-3">
                                    <h6 class="mb-0">Celimar Castillo</h6>
                                    <p class="text-muted text-xs mb-2">Hace 1 hora</p>
                                    <span class="text-muted text-sm col-11 p-0 text-truncate d-block">Vas a ir Mañana al
                                        Evento?</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-12">
                <div class="card blur shadow-blur max-height-vh-70">
                    <div class="card-header shadow-lg">
                        <div class="row">
                            <div class="col-lg-10 col-8">
                                <div class="d-flex align-items-center">
                                    <img alt="Image" src="{{ asset('img/team-3.jpg') }}" class="avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0 d-block">Kevin Cardenas</h6>
                                        <span class="text-sm text-dark opacity-8">Ultima vez activo a las 15:30</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-2 my-auto pe-0">
                                {{-- <button class="btn btn-icon-only shadow-none text-dark mb-0 me-3 me-sm-0" type="button"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title
                                    data-bs-original-title="Video call">
                                    <i class="ni ni-camera-compact"></i>
                                </button> --}}
                            </div>

                            <div class="col-lg-1 col-2 my-auto ps-0">
                                <div class="dropdown">
                                    <button class="btn btn-icon-only shadow-none text-dark mb-0" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="ni ni-settings"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end me-sm-n2 p-2" aria-labelledby="chatmsg">
                                        <li>
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <i class="ni ni-single-02 text-primary"></i> Ver Perfil
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <i class="ni ni-user-run text-danger"></i> Bloquear
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <i class="ni ni-archive-2 text-success"></i> Vaciar Chat
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <i class="ni ni-fat-remove text-danger"></i> Borrar Conversación
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body overflow-auto overflow-x-hidden">
                        <div class="row justify-content-start mb-4">
                            <div class="col-auto">
                                <div class="card ">
                                    <div class="card-body py-2 px-3">
                                        <p class="mb-1">
                                            It contains a lot of good lessons about effective practices
                                        </p>
                                        <div class="d-flex align-items-center text-sm opacity-6">
                                            <i class="ni ni-check-bold text-sm me-1"></i>
                                            <small>3:14am</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end text-right mb-4">
                            <div class="col-auto">
                                <div class="card bg-gray-200">
                                    <div class="card-body py-2 px-3">
                                        <p class="mb-1">
                                            Can it generate daily design links that include essays and data visualizations
                                            ?<br>
                                        </p>
                                        <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                            <i class="ni ni-check-bold text-sm me-1"></i>
                                            <small>4:42pm</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <span class="badge text-dark">Wed, 3:27pm</span>
                            </div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-auto">
                                <div class="card ">
                                    <div class="card-body py-2 px-3">
                                        <p class="mb-1">
                                            Yeah! Responsive Design is geared towards those trying to build web apps
                                        </p>
                                        <div class="d-flex align-items-center text-sm opacity-6">
                                            <i class="ni ni-check-bold text-sm me-1"></i>
                                            <small>4:31pm</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end text-right mb-4">
                            <div class="col-auto">
                                <div class="card bg-gray-200">
                                    <div class="card-body py-2 px-3">
                                        <p class="mb-1">
                                            Excellent, I want it now !
                                        </p>
                                        <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                            <i class="ni ni-check-bold text-sm me-1"></i>
                                            <small>4:42pm</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-start mb-4">
                            <div class="col-5">
                                <div class="card ">
                                    <div class="card-body p-2">
                                        <div class="col-12 p-0">
                                            <img src="https://images.unsplash.com/photo-1602142946018-34606aa83259?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1762&q=80"
                                                alt="Rounded image" class="img-fluid mb-2 border-radius-lg">
                                        </div>
                                        <div class="d-flex align-items-center text-sm opacity-6">
                                            <i class="ni ni-check-bold text-sm me-1"></i>
                                            <small>4:47pm</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end text-right mb-4">
                            <div class="col-auto">
                                <div class="card bg-gray-200">
                                    <div class="card-body py-2 px-3">
                                        <p class="mb-0">
                                            At the end of the day … the native dev apps is where users are
                                        </p>
                                        <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                            <i class="ni ni-check-bold text-sm me-1"></i>
                                            <small>4:42pm</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start">
                            <div class="col-auto">
                                <div class="card ">
                                    <div class="card-body py-2 px-3">
                                        <p class="mb-0">
                                            Kevin Cardenas Está Escribiendo...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-block">
                        <form class="align-items-center">
                            <div class="d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Escribe Algo..."
                                        aria-label="Message example input">
                                </div>
                                <button class="btn bg-gradient-primary mb-0 ms-2">
                                    <i class="ni ni-send"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
