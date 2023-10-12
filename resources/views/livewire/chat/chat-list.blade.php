<div class="bg-white shadow-lg p-4 rounded-lg">
    <div class="chatlist_header flex items-center justify-between mb-4">
        <div class="text-2xl font-bold text-indigo-700">Chat</div>
        <div class="img_container w-12 h-12 sm:w-16 sm:h-16 rounded-full overflow-hidden">
            <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ auth()->user()->name }}" alt="{{ auth()->user()->name }}">
        </div>
    </div>

    <div class="chatlist_body space-y-4">
        <div class="sm:hidden">
            <!-- Botón para mostrar/ocultar la lista de chat en pantallas pequeñas -->
            <button
                class="w-full bg-indigo-700 text-white py-2 px-4 rounded-lg hover:bg-indigo-800"
                wire:click="toggleChatList"
                wire:ignore>
                Mostrar/ocultar lista de chat
            </button>
        </div>
        <div class="sm:block">
            @if ($showChatList)
                @forelse ($conversations as $conversation)
                    <div class="chatlist_item border border-gray-300 rounded-lg p-4 cursor-pointer transition-transform transform hover:scale-105" wire:key="{{ $conversation->id }}" wire:click="chatUserSelected({{ $conversation->id }}, '{{ $this->getChatUserInstance($conversation, 'id') }}')">
                        <div class="flex items-center">
                            <div class="chatlist_img_container w-12 h-12 sm:w-16 sm:h-16 rounded-full overflow-hidden">
                                <img src="https://ui-avatars.com/api/?name={{ $this->getChatUserInstance($conversation, 'name') }}" alt="{{ $this->getChatUserInstance($conversation, 'name') }}">
                            </div>
                            <div class="chatlist_info ml-4">
                                <div class="top_row flex items-center">
                                    <div class="font-bold text-lg text-indigo-700">
                                        {{ $this->getChatUserInstance($conversation, 'name') }}
                                    </div>
                                    <span class="text-sm text-gray-600 ml-2">
                                        {{ optional($conversation->messages->last())->created_at->shortAbsoluteDiffForHumans() }}
                                    </span>
                                </div>
                                <div class="bottom_row">
                                    <div class="message_body text-truncate text-gray-700">
                                        {{ optional($conversation->messages->last())->body }}
                                    </div>
                                    @php
                                        $unreadCount = $conversation->messages
                                            ->where('read', 0)
                                            ->where('receiver_id', auth()->user()->id)
                                            ->count();
                                    @endphp
                                    @if ($unreadCount > 0)
                                        <div class="unread_count text-xs font-semibold rounded-full text-white bg-red-500 px-3 py-1">
                                            {{ $unreadCount }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-500">No tienes conversaciones</div>
                @endforelse
            @endif
        </div>
    </div>
</div>
