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
    public $body;
    public $createdMessage;
    protected $listeners = ['updateSendMessage', 'dispatchMessageSent', 'resetComponent'];

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
            'body' => 'required|string|min:1',
        ]);

        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();

        // Reemplaza $this->emitTo con $this->dispatch y to('chat.chatbox')
        $this->dispatch('pushMessage', $this->createdMessage->id)->to('chat.chatbox');

        // Reemplaza $this->emitTo con $this->dispatch y to('chat.chat-list')
        $this->dispatch('refresh')->to('chat.chat-list');

        $this->reset('body');

        // Reemplaza $this->emitSelf con $this->dispatch y self()
        $this->dispatch('dispatchMessageSent')->self();
    }


    public function dispatchMessageSent()
    {
        broadcast(new MessageSent(auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance));
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
