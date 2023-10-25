<div class="container mt-4">
    <div class="bg-white shadow p-4 rounded">
        <div class="d-flex justify-content-between mb-4">
            <div class="h2 font-weight-bold text-indigo">Chat</div>
            <div class="img_container w-12 h-12 rounded-circle overflow-hidden">
                <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ auth()->user()->name }}" alt="{{ auth()->user()->name }}">
            </div>
        </div>

        <div class="space-y-4">
            <div class="d-none d-sm-block">
                @if ($showChatList)
                    @forelse ($conversations as $conversation)
                        <div class="card chat-card" wire:key="{{ $conversation->id }}" wire:click="chatUserSelected({{ $conversation->id }})">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="font-weight-bold h4 text-indigo">{{ $conversation->otherUser->name }}</div>
                                    <span class="text-muted small">{{ $conversation->lastMessageTime }}</span>
                                </div>
                                <div class="message_body text-truncate text-secondary">{{ $conversation->lastMessage }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="text-muted">No tienes conversaciones</div>
                    @endforelse
                @endif
            </div>
            <div class="d-block d-sm-none">
                <button class="w-100 bg-indigo text-white py-2 px-4 rounded hover:bg-indigo-800" wire:click="toggleChatList" wire:ignore>
                    Mostrar/ocultar lista de chat
                </button>
            </div>
        </div>
    </div>
</div>
