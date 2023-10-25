<div class="container mt-4">
    @if ($selectedConversation)
        <!-- Contenido cuando se selecciona una conversación -->
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
                        <!-- Se aplicó 'min-h-10' para un tamaño mínimo -->
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
        {{-- <script src="{{ asset('js/chatbox-scripts.js') }}"></script> --}}
    @else
        <!-- Contenido cuando no se selecciona una conversación -->
        <div class="text-center mt-5">
            <div class="text-2xl font-weight-bold text-indigo">
                <i class="bi bi-exclamation-circle fs-4 text-indigo"></i>
                No hay seleccionada una Conversación
            </div>
        </div>
    @endif
</div>
