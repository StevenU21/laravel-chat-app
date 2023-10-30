<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function conversations()
    {
        //validar si un usuario esta en linea
        return view('conversations/index');
    }

    public function explore()
    {
        return view('conversations/explore');
    }
}
