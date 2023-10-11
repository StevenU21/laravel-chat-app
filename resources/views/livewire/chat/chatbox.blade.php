<div>
    @if ($selectedConversation)
        <div class="chatbox_header">
            <div class="return">
                <i class="bi bi-arrow-left"></i>
            </div>
            <div class="img_container">
                <img src="{{ asset('storage/profile_images/' . $receiver->profile_image) }}" alt="{{ $receiver->name }}">
            </div>
            <div class="name">
                {{ $receiver->name }}
            </div>
        </div>
        <div class="chatbox_body">
            @foreach ($messages as $message)
                <div class="msg_body  {{ auth()->id() == $message->sender_id ? 'msg_body_me' : 'msg_body_receiver' }}"
                    style="width:80%;max-width:80%;max-width:max-content">
                    {{ $message->body }}
                    <div class="msg_body_footer">
                        <div class="date">
                            {{ $message->created_at->format('m: i a') }}
                        </div>
                        <div class="read">
                            @php
                                if ($message->user->id === auth()->id()) {
                                    if ($message->read == 0) {
                                        echo '<i class="bi bi-check2 status_tick"></i> ';
                                    } else {
                                        echo '<i class="bi bi-check2-all text-primary"></i> ';
                                    }
                                }
                            @endphp
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <script src="{{ asset('js/chatbox-scripts.js') }}"></script>
    @else
        <div class="fs-4 text-center text-primary mt-5">
            No conversation selected
        </div>
    @endif
</div>
    