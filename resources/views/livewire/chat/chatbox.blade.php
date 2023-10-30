<!-- Contenido del chat cuando se selecciona una conversación -->
@if ($selectedConversation)
    <div class="card-body overflow-auto overflow-x-hidden">
        @livewire('chat.user-info', ['name' => $receiver->name, 'isOnline' => true])
        <br>
        <!-- Aquí debes incluir la lógica para mostrar los mensajes -->
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
    <!-- Contenido cuando no se selecciona una conversación -->
    <div class="text-center mt-5">
        <div class="text-2xl font-weight-bold text-white">
            <i class="bi bi-exclamation-circle fs-4 text-indigo"></i>
            No hay seleccionada una Conversación
        </div>
    </div>
@endif
