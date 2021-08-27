<?php

namespace App\Services;

use App\Models\Chat;

class ChatsService
{
    public function getChatByUsers(int $ownerId, int $recipientId): Chat
    {
        $chat = Chat::byUsers($ownerId, $recipientId)->first();

        if (is_null($chat)) {
            $chat = $this->create($ownerId, $recipientId);
        }

        return $chat;
    }

    public function create(int $ownerId, int $recipientId): Chat
    {
        return Chat::create([
            'owner_id' => $ownerId,
            'recipient_id' => $recipientId
        ]);
    }
}
