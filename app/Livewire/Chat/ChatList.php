<?php
namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;

class ChatList extends Component
{
    public $search = '';
    public $authUserId;
    public $conversations;
    public $selectedConversation;
    public $receiverInstance;
    public $showChatList = true;
    protected $listeners = ['chatUserSelected', 'refresh' => '$refresh', 'resetComponent'];

    public function resetComponent()
    {
        $this->selectedConversation = null;
        $this->receiverInstance = null;
    }

    public function chatUserSelected(Conversation $conversation)
    {
        $this->selectedConversation = $conversation;
        $receiverInstance = $this->getReceiverInstance($conversation);

        $this->dispatch('loadConversation', $this->selectedConversation, $receiverInstance);
        $this->dispatch('updateSendMessage', $this->selectedConversation, $receiverInstance);
    }

    public function toggleChatList()
    {
        $this->showChatList = !$this->showChatList;
    }

    public function mount()
    {
        $this->loadConversations();
    }

    public function loadConversations()
    {
        $authUserId = auth()->id();
        $this->conversations = Conversation::whereHas('users', function ($query) use ($authUserId) {
            $query->where('users.id', $authUserId);
        })->with(['users' => function ($query) use ($authUserId) {
            $query->where('users.id', '!=', $authUserId);
        }])->orderByDesc('last_time_message')->get();
    }

    private function getReceiverInstance(Conversation $conversation)
    {
        $authUserId = auth()->id();

        $receiver = $conversation->users->whereNotIn('id', [$authUserId])->first();

        return $receiver ?? null;
    }

    public function render()
    {
        // Si necesitas recargar las conversaciones, llama a loadConversations
        $this->loadConversations();

        // Adjuntar datos adicionales a las conversaciones
        $this->conversations->transform(function ($conversation) {
            $conversation->otherUser = $conversation->users->where('id', '!=', auth()->id())->first();
            $conversation->lastMessage = optional($conversation->messages->last())->message;
            $conversation->lastMessageTime = optional($conversation->messages->last())->created_at->shortAbsoluteDiffForHumans();
            $conversation->unreadCount = $conversation->messages
                ->where('read', 0)
                ->where('sender_id', '!=', auth()->user()->id)
                ->count();
            return $conversation;
        });

        return view('livewire.chat.chat-list');
    }
}
