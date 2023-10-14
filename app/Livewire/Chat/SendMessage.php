<?php

namespace App\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class SendMessage extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $message = '';
    public $createdMessage;
    protected $listeners = ['updateSendMessage', 'resetComponent'];

    public function resetComponent()
    {
        $this->selectedConversation = null;
        $this->receiverInstance = null;
    }

    public function updateSendMessage(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    }

    public function sendMessage()
    {
        $this->validate([
            'message' => 'required|string|min:1',
        ]);

        $createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'message' => $this->message,
        ]);

        $this->selectedConversation->update([
            'last_time_message' => $createdMessage->created_at,
        ]);

        $this->dispatch('pushMessage', $createdMessage->id)->to('chat.chatbox');
        $this->dispatch('refresh')->to('chat.chat-list');
        $this->reset('message');
        $this->dispatchMessageSent($createdMessage);
    }

    public function dispatchMessageSent(Message $message)
    {
        broadcast(new MessageSent(auth()->user(), $message, $this->selectedConversation, $this->receiverInstance));
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
