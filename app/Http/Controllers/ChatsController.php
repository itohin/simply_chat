<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function index()
    {
        $users = User::noVisitor()->latest()->get();

        return view('chats.index', compact('users'));
    }
}
