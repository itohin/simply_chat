<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessagesRequest;
use App\Models\Chat;
use Illuminate\Http\JsonResponse;

class MessagesController extends Controller
{
    public function index(Chat $chat): JsonResponse
    {
        $messages = $chat->messages()->orderBy('id')->get();
        return response()->json(compact('messages'));
    }

    public function store(MessagesRequest $request, Chat $chat, int $ownerId, int $recipientId): JsonResponse
    {
        $message = $chat->messages()->create([
            'owner_id' => $ownerId,
            'recipient_id' => $recipientId,
            'content' => $request['message']
        ]);

        return response()->json(compact('message'));
    }
}
