<div class="card-header shadow-lg">
    <div class="row">
        <div class="col-lg-10 col-8">
            <div class="d-flex align-items-center">
                <img alt="Image" src="{{ asset('img/team-3.jpg') }}" class="avatar">
                <div class="ms-3">
                    <h6 class="mb-0 d-block">{{ $name }}</h6>
                    <span
                        class="text-sm text-dark opacity-8">{{ $isOnline ? 'En línea' : 'Última vez activo a las 15:30' }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-2 my-auto pe-0">
            <button class="btn btn-icon-only shadow-none text-dark mb-0 me-3 me-sm-0" type="button"
                data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="Video call">
                <i class="ni ni-camera-compact"></i>
            </button>
        </div>

        <div class="col-lg-1 col-2 my-auto ps-0">
            <div class="dropdown">
                <button class="btn btn-icon-only shadow-none text-dark mb-0" type="button" data-bs-toggle="dropdown">
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
