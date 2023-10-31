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

    // public function checkConversation($receiverId)
    // {
    //     // Busca una conversación existente entre el usuario autenticado y el receptor
    //     $authUserId = auth()->user()->id;

    //     $existingConversation = Conversation::whereHas('users', function ($query) use ($authUserId, $receiverId) {
    //         $query->whereIn('user_id', [$authUserId, $receiverId]);
    //     })->get();

    //     if ($existingConversation->isNotEmpty()) {
    //         // La conversación ya existe
    //         session()->flash('message', 'Ya existe una conversación con este usuario.');
    //         return;
    //     }

    //     // La conversación no existe, así que la creamos
    //     $createdConversation = Conversation::create([
    //         'last_time_message' => now(),
    //     ]);

    //     $createdConversation->users()->attach([$authUserId, $receiverId]);

    //     $createdMessage = Message::create([
    //         'conversation_id' => $createdConversation->id,
    //         'sender_id' => $authUserId,
    //         'receiver_id' => $receiverId,
    //         'message' => $this->message,
    //     ]);

    //     $this->createdConversation = $createdConversation;
    //     session()->flash('message', 'Conversación creada con éxito.');
    // }

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
            // Si no se encuentra una conversación, crea una nueva
            $conversation = Conversation::create([
                'name' => 'Conversación de ' . $user->name,
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
