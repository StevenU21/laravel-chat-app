<div class="container mt-4">
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
</div>
