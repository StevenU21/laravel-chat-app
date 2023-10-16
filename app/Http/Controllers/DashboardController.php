<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $usersLastWeek = User::whereBetween('created_at', [now()->subWeek(), now()])->count();
        $totalConversations = Conversation::count();
        $totalMessages = Message::count();

        return view('dashboard', compact('totalUsers', 'usersLastWeek', 'totalConversations', 'totalMessages'));
    }
}
