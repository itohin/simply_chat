<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Services\ChatsService;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    private ChatsService $chatsService;

    public function __construct(ChatsService $chatsService)
    {
        $this->chatsService = $chatsService;
    }

    public function index()
    {
        $users = User::noOwner()->latest()->paginate(20);

        return view('chats.index', compact('users'));
    }

    public function show(User $recipient)
    {
        $owner = auth()->user();
        $chat = $this->chatsService->getChatByUsers($recipient->id, $owner->id);

        return view('chats.show', compact('chat', 'owner', 'recipient'));
    }
}
