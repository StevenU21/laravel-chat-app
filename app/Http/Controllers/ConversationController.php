<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function conversations()
    {
        return view('conversations/index');
    }

    public function explore()
    {
        return view('conversations/explore');
    }
}
