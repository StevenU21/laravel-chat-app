<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class CreateChat extends Component
{
    public $users;
    public $message = 'Hola! Me gustaría saber más sobre tus productos.';
    public $createdConversation;

    public function checkconversation($receiverId)
    {
        $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)
            ->where('sender_id', $receiverId)
            ->orWhere('receiver_id', $receiverId)
            ->where('sender_id', auth()->user()->id)
            ->get();

        if (count($checkedConversation) == 0) {
            $createdConversation = Conversation::create([
                'receiver_id' => $receiverId,
                'sender_id' => auth()->user()->id,
                'last_time_message' => now(),
            ]);
            $createdMessage = Message::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $receiverId,
                'conversation_id' => $createdConversation->id,
                'message' => $this->message
            ]);
            $this->createdConversation = $createdConversation;
        } elseif (count($checkedConversation) >= 1) {
            dd('conversation exists');
        }
    }

    public function render()
    {
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
        return view('livewire.chat.create-chat');
    }
}
