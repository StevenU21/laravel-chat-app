<?php

namespace App\Livewire\Chat;

use App\Events\MessageRead;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Chatbox extends Component
{
    public $selectedConversation;
    public $receiver;
    public $messages;
    public $paginateVar = 10;
    public $height;
    public $messages_count;
    public $createdMessage;

    public function getListeners()
    {
        $auth_id = auth()->user()->id;
        return [
            "echo-private:chat.{$auth_id},MessageSent" => 'broadcastedMessageReceived',
            "echo-private:chat.{$auth_id},MessageRead" => 'broadcastedMessageRead',
            'loadConversation', 'pushMessage', 'loadmore', 'updateHeight', 'broadcastMessageRead', 'resetComponent',
        ];
    }

    public function resetComponent()
    {
        $this->selectedConversation = null;
        $this->receiver = null;
    }

    public function broadcastedMessageRead($event)
    {
        if ($this->selectedConversation) {
            if ((int)$this->selectedConversation->id === (int)$event['conversation_id']) {
                $this->dispatch('markMessageAsRead');
            }
        }
    }

    public function broadcastedMessageReceived($event)
    {
        $this->dispatch('refresh')->to('chat.chat-list');
        $broadcastedMessage = Message::find($event['message']);
        if ($this->selectedConversation) {
            if ((int)$this->selectedConversation->id === (int)$event['conversation_id']) {
                $broadcastedMessage->read = 1;
                $broadcastedMessage->save();
                $this->pushMessage($broadcastedMessage->id);
                $this->dispatch('broadcastMessageRead')->self();
            }
        }
    }

    public function broadcastMessageRead()
    {
        broadcast(new MessageRead($this->selectedConversation->id, $this->receiver->id));
    }

    public function pushMessage($messageId)
    {
        $newMessage = Message::find($messageId);
        $this->messages->push($newMessage);
        $this->dispatch('rowChatToBottom');
    }

    public function loadmore()
    {
        $this->paginateVar += 10;

        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->orderBy('created_at', 'desc')
            ->limit($this->paginateVar)
            ->get()
            ->reverse();

        Message::where('conversation_id', $this->selectedConversation->id)
            ->where('sender_id', '!=', auth()->user()->id)
            ->where('read', 0)
            ->update(['read' => 1]);

        $this->dispatch('updatedHeight', ['height' => $this->height]);
    }

    public function updateHeight($height)
    {
        $this->height = $height;
    }

    public function loadConversation(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiver = $receiver;
        $this->messages_count = $conversation->messages()->count();
        $this->messages = $conversation->messages()
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->limit($this->paginateVar)
            ->get()
            ->reverse();

        $conversation->messages()
            ->where('sender_id', '!=', auth()->user()->id)
            ->update(['read' => 1]);

        $this->dispatch('broadcastMessageRead', ['conversationId' => $conversation->id]);
    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
