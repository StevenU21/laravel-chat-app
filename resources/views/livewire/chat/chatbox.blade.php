<div>
    @if ($selectedConversation)
        <!-- Contenido cuando se selecciona una conversación -->
        <div class="bg-blue-500 text-white p-4 flex items-center">
            <div class="mr-4">
                <i class="bi bi-arrow-left text-xl"></i>
            </div>
            <div class="img_container">
                <img src="{{ asset('profile_images/perfil.png' . $receiver->profile_image) }}" alt="{{ $receiver->name }}"
                    class="w-12 h-12 rounded-full">
            </div>
            <div class="name ml-4 text-2xl font-semibold">
                {{ $receiver->name }}
            </div>
        </div>
        <div class="chatbox_body p-4">
            @foreach ($messages as $message)
                <div
                    class="message relative mb-4 {{ auth()->id() == $message->sender_id ? 'text-right' : 'text-left' }}">
                    <div
                        class="message-container {{ auth()->id() == $message->sender_id ? 'bg-blue-500 text-white' : 'bg-gray-200 text-black' }} rounded-lg p-3 max-w-md inline-block relative group hover:bg-blue-600 hover:text-white transition duration-300">
                        <!-- Se aplicó 'min-h-10' para un tamaño mínimo -->
                        {{ $message->message }}
                        <div class="absolute bottom-0 right-0 text-xs opacity-60 group-hover:opacity-100">
                            {{ $message->created_at->format('m:i a') }}</div>
                        </div>
                        <div class="read ml-2">
                            @if ($message->user->id === auth()->id())
                                @if ($message->read == 0)
                                    <i class="bi bi-check2 text-gray-400"></i>
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
            <!-- Contenido cuando no se selecciona una conversación -->
            <div class="text-center mt-5">
                <div class="text-2xl font-semibold text-indigo-700">
                    <i class="bi bi-exclamation-circle text-4xl text-indigo-700"></i>
                    No hay seleccionada una Conversación
                </div>
            </div>
        @endif
    </div>
