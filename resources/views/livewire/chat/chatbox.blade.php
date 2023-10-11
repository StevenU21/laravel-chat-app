<div>
    @if ($selectedConversation)
        <div class="bg-blue-500 text-white p-4 flex items-center">
            <div class="mr-4">
                <i class="bi bi-arrow-left text-xl"></i>
            </div>
            <div class="img_container">
                <img src="{{ asset('storage/profile_images/' . $receiver->profile_image) }}" alt="{{ $receiver->name }}" class="w-12 h-12 rounded-full">
            </div>
            <div class="name ml-4 text-2xl font-semibold">
                {{ $receiver->name }}
            </div>
        </div>
        <div class="chatbox_body p-4">
            @foreach ($messages as $message)
                <div class="message {{ auth()->id() == $message->sender_id ? 'message-me' : 'message-receiver' }}">
                    <div class="bg-white rounded-lg p-3" style="max-width: 80%;">
                        {{ $message->body }}
                    </div>
                    <div class="message-footer flex justify-between items-center text-gray-600 mt-2">
                        <div class="date text-sm">
                            {{ $message->created_at->format('m:i a') }}
                        </div>
                        <div class="read">
                            @if ($message->user->id === auth()->id())
                                @if ($message->read == 0)
                                    <i class="bi bi-check2 text-gray-400"></i>
                                @else
                                    <i class="bi bi-check2-all text-primary"></i>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <script src="{{ asset('js/chatbox-scripts.js') }}"></script>
    @else
        <div class="text-center text-primary mt-5 text-2xl font-semibold">
            No conversation selected
        </div>
    @endif
</div>
