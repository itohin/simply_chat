<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'recipient_id'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function scopeByUsers(Builder $builder, int $ownerId, int $recipientId)
    {
        return $builder->where(function ($query) use ($ownerId, $recipientId) {
            return $query->where('owner_id', $ownerId)->where('recipient_id', $recipientId);
        })->orWhere(function ($query) use ($ownerId, $recipientId) {
            return $query->where('recipient_id', $ownerId)->where('owner_id', $recipientId);
        });
    }
}
