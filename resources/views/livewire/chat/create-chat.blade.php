<div class="container mt-4">
    <h2 class="text-center text-white">Conecta con usuarios de todo el Mundo</h2>
    <div class="row">
        @foreach ($usersWithActivity as $user)
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset('img/curved-images/curved-6.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($user->name, 18) }}</h5>
                        <p class="card-text text-truncate">Estado:
                            <span class="badge bg-gradient-{{ $user->activity && $user->activity->is_online ? 'success' : 'danger' }}">
                                {{ $user->activity && $user->activity->is_online ? 'En Línea' : 'Inactivo' }}
                            </span>
                        </p>
                        <button class="btn btn-primary" wire:click="checkConversation({{ $user->id }})">Iniciar Conversación</button>
                    </div>
                </div>
            </div>
            @if ($loop->iteration % 4 == 0)
                </div><div class="row">
            @endif
        @endforeach
    </div>
</div>

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
