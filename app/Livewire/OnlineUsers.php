<?php

namespace App\Livewire;

use App\Models\UserActivity;
use Livewire\Component;

class OnlineUsers extends Component
{
    public $onlineUsers;

    public function render()
    {
        $this->onlineUsers = UserActivity::where('is_online', true)->count();
        return view('livewire.online-users');
    }
}
