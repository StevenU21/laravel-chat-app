<!-- Contenido del chat cuando se selecciona una conversación -->
<div class="card blur shadow-blur max-height-vh-70">
    @if ($selectedConversation)
        {{-- @livewire('chat.user-info', ['name' => $receiver->name, 'isOnline' => true]) --}}
        <div class="card-header shadow-lg">
            <div class="row">
                <div class="col-lg-10 col-8">
                    <div class="d-flex align-items-center">
                        <img alt="Image" src="{{ asset('img/team-3.jpg') }}" class="avatar">
                        <div class="ms-3">
                            <h6 class="mb-0 d-block">{{ $receiver->name }}</h6>
                            <span class="text-sm text-dark opacity-8">Activo</span>
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
            @foreach ($messages as $message)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-{{ $message->sender_id == auth()->id() ? 'end' : 'start' }}">
                            <div
                                class="card p-2 mb-2 {{ $message->sender_id == auth()->id() ? 'bg-primary text-white' : 'bg-gray-200' }}">
                                <div class="card-body py-2 px-3">
                                    <p class="mb-1">
                                        {{ $message->message }}
                                    </p>
                                    <div class="d-flex align-items-center text-sm opacity-6">
                                        <i class="ni ni-check-bold text-sm me-1"></i>
                                        <small>{{ $message->created_at->format('h:ia') }}</small>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center mt-5">
            <div class="text-2xl font-weight-bold text-">
                <i class="bi bi-exclamation-circle fs-4 text-muted"></i>
                No hay seleccionada una Conversación
            </div>
        </div>
    @endif

</div>

{{-- <div class="container mt-4">
    @if ($selectedConversation)
        <div class="bg-primary text-white p-4 d-flex align-items-center">
            <div class="me-4">
                <i class="bi bi-arrow-left fs-4"></i>
            </div>
            <div class="img_container">
                <img src="{{ asset('profile_images/perfil.png' . $receiver->profile_image) }}" alt="{{ $receiver->name }}" class="w-75 h-75 rounded-circle">
            </div>
            <div class="name ms-4 text-2xl font-weight-bold">
                {{ $receiver->name }}
            </div>
        </div>
        <div class="chatbox_body p-4">
            @foreach ($messages as $message)
                <div class="message relative mb-4 {{ auth()->id() == $message->sender_id ? 'text-end' : 'text-start' }}">
                    <div class="message-container {{ auth()->id() == $message->sender_id ? 'bg-primary text-white' : 'bg-light text-black' }} rounded-lg p-3 max-w-md inline-block relative group hover-bg-primary hover-text-white transition-300">

                        {{ $message->message }}
                        <div class="position-absolute bottom-0 end-0 text-xs opacity-60 group-hover-opacity-100">
                            {{ $message->created_at->format('m:i a') }}
                        </div>
                    </div>
                    <div class="read ms-2">
                        @if ($message->user_id === auth()->id())
                            @if ($message->read == 0)
                                <i class="bi bi-check2 text-secondary"></i>
                            @else
                                <i class="bi bi-check2-all text-primary"></i>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <script src="{{ asset('js/chatbox-scripts.js') }}"></script>
    @else
        <div class="text-center mt-5">
            <div class="text-2xl font-weight-bold text-indigo">
                <i class="bi bi-exclamation-circle fs-4 text-indigo"></i>
                No hay seleccionada una Conversación
            </div>
        </div>
    @endif
</div> --}}
