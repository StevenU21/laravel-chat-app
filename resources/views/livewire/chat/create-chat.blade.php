{{-- <div class="container mt-4">
    <h2 class="text-center">Usuarios en línea</h2>
    <div class="row">
        @foreach ($users as $user)
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card">
                    <img class="card-img-top"
                        src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ $user->name }}"
                        alt="{{ $user->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text text-truncate">Estado: En línea</p>
                        <button class="btn btn-primary" wire:click="checkConversation({{ $user->id }})">Iniciar
                            Conversación</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}

<div class="container mt-4">
    <h2 class="text-center text-white">Iniciar una Conversación</h2>
    <div class="row">
        @foreach ($users as $user)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <a href="javascript:;" class="d-block">
                            <img src="{{ asset('img/kit/pro/anastasia.jpg') }}" class="img-fluid border-radius-lg">
                        </a>
                    </div>

                    <div class="card-body pt-2">
                        <span
                            class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">House</span>
                        <a href="javascript:;" class="card-title h5 d-block text-darker">
                            Shared Coworking
                        </a>
                        <p class="card-description mb-4">
                            Use border utilities to quickly style the border and border-radius of an element. Great for
                            images, buttons.
                        </p>
                        <div class="author align-items-center">
                            <img src="{{ asset('img/kit/pro/team-2.jpg') }}" alt="..." class="avatar shadow">
                            <div class="name ps-3">
                                <span>Mathew Glock</span>
                                <div class="stats">
                                    <small>Posted on 28 February</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
