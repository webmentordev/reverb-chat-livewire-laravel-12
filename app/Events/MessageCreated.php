<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Message $message)
    {
        //
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->message->id,
            'email' => $this->message->user->email,
        ];
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('message'),
        ];
    }
}
