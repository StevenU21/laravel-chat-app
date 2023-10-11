<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;

class ChatList extends Component
{
    public $auth_id;
    public $conversations;
    public $receiverInstance;
    public $name;
    public $selectedConversation;
    protected $listeners = ['chatUserSelected', 'refresh' => '$refresh', 'resetComponent'];

    public function resetComponent()
    {
        $this->selectedConversation = null;
        $this->receiverInstance = null;
    }

    public function chatUserSelected(Conversation $conversation, $receiverId)
    {
        $this->selectedConversation = $conversation;
        $receiverInstance = User::find($receiverId);

        // Dispatch events instead of using emitTo
        $this->dispatch('loadConversation', $this->selectedConversation, $receiverInstance);
        $this->dispatch('updateSendMessage', $this->selectedConversation, $receiverInstance);
    }

    public function getChatUserInstance(Conversation $conversation, $request)
    {
        $this->auth_id = auth()->id();
        $this->receiverInstance = $this->getReceiverInstance($conversation);

        if (isset($request)) {
            return $this->receiverInstance->$request;
        }
    }

    private function getReceiverInstance(Conversation $conversation)
    {
        $authId = auth()->id();
        $senderId = $conversation->sender_id;
        $receiverId = $conversation->receiver_id;

        return $authId === $senderId ? User::find($receiverId) : User::find($senderId);
    }

    public function mount()
    {
        $this->auth_id = auth()->id();
        $this->conversations = Conversation::where(function ($query) {
            $query->where('sender_id', $this->auth_id)
                ->orWhere('receiver_id', $this->auth_id);
        })->orderByDesc('last_time_message')->get();
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
