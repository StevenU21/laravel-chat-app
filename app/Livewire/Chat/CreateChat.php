<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class CreateChat extends Component
{
    public $usersWithActivity;
    public $users;
    public $message = 'Hola! Me gustaría saber más sobre tus productos.';
    public $createdConversation;

    public function checkConversation($receiverId)
    {
        // Obtén el usuario autenticado
        $user = auth()->user();

        // Busca una conversación en la que el usuario autenticado y el usuario receptor estén involucrados
        $conversation = $user->conversations()
            ->whereHas('users', function ($query) use ($receiverId) {
                $query->where('users.id', $receiverId);
            })
            ->first();

        if (!$conversation) {
            // La conversación no existe, así que la creamos
            $conversation = Conversation::create([
                //el nombre de la conversación es el nombre del usuario receptor y el usuario autenticado
                'name' => User::find($receiverId)->name . ' . ' . auth()->user()->name,
                'last_time_message' => now(),
            ]);

            // Adjunta a los usuarios involucrados en la conversación
            $conversation->users()->attach([$user->id, $receiverId]);
        }

        // Crea el mensaje
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $user->id,
            'receiver_id' => $receiverId,
            'message' => $this->message,
        ]);

        // Actualiza la última hora del mensaje
        $conversation->update(['last_time_message' => now()]);

        session()->flash('success', '¡Conversación creada con éxito!');
        return redirect()->to('/conversations');
        // Guarda la conversación creada en una propiedad para su uso posterior
        $this->createdConversation = $conversation;
    }

    public function render()
    {
        $this->usersWithActivity = User::where('id', '!=', auth()->user()->id)
            ->with('activity')
            ->get();

        // $this->users = User::where('id', '!=', auth()->user()->id)->get();
        return view('livewire.chat.create-chat');
    }
}
