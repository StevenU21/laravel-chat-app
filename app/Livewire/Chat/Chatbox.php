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

    protected $rules = [
        'message' => 'required|string|max:255',
    ];

    public function  getListeners()
    {
        $auth_id = auth()->user()->id;
        return [
            "echo-private:chat.{$auth_id},MessageSent" => 'broadcastedMessageReceived',
            "echo-private:chat.{$auth_id},MessageRead" => 'broadcastedMessageRead',
            'loadConversation', 'pushMessage', 'loadmore', 'updateHeight', 'broadcastMessageRead', 'resetComponent'
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
            if ((int) $this->selectedConversation->id === (int) $event['conversation_id']) {
                $this->dispatchBrowserEvent('markMessageAsRead');
            }
        }
    }

    function broadcastedMessageReceived($event)
    {
        $this->emitTo('chat.chat-list', 'refresh');
        $broadcastedMessage = Message::find($event['message']);
        if ($this->selectedConversation) {
            if ((int) $this->selectedConversation->id  === (int)$event['conversation_id']) {
                $broadcastedMessage->read = 1;
                $broadcastedMessage->save();
                $this->pushMessage($broadcastedMessage->id);
                $this->emitSelf('broadcastMessageRead');
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
        $this->paginateVar = $this->paginateVar + 10;
        $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();

        $this->messages = Message::where('conversation_id',  $this->selectedConversation->id)
            ->skip($this->messages_count -  $this->paginateVar)
            ->take($this->paginateVar)->get();

        $height = $this->height;
        $this->dispatch('updatedHeight', ['height' => $height]);
    }

    function updateHeight($height)
    {
        $this->height = $height;
    }

    public function loadConversation(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiver = $receiver;
        $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->skip($this->messages_count - $this->paginateVar)
            ->take($this->paginateVar)->get();
        $this->dispatch('chatSelected');
        Message::where('conversation_id', $this->selectedConversation->id)
            ->where('receiver_id', auth()->user()->id)->update(['read' => 1]);
        $this->dispatch('broadcastMessageRead', ['conversationId' => $this->selectedConversation->id]);
    }

    public function sendMessage()
    {
        $this->validate();

        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiver->id,
            'message' => $this->message,
        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();

        $this->dispatch('pushMessage', $this->createdMessage->id)->to('chat.chatbox');

        $this->dispatch('refresh')->to('chat.chat-list');

        $this->reset('message');

        $this->dispatch('dispatchMessageSent')->self();
    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
