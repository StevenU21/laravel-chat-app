<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class UserInfo extends Component
{
    public $name;
    public $isOnline;

    public function mount($name, $isOnline)
    {
        $this->name = $name;
        $this->isOnline = $isOnline;
    }

    public function blockUser()
    {
        // Agrega la lógica para bloquear al usuario aquí
    }

    public function clearChat()
    {
        // Agrega la lógica para vaciar el chat aquí
    }

    public function deleteConversation()
    {
        // Agrega la lógica para eliminar la conversación aquí
    }

    public function render()
    {
        return view('livewire.chat.user-info');
    }
}
