<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewChatMessage implements ShouldBroadcast
{
    use InteractsWithSockets;

    public $message;

    public $roomId;

    public function __construct($roomId, $message)
    {
        $this->roomId = $roomId;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new PrivateChannel(sprintf('chat.%1$s', $this->roomId));
    }

    public function broadcastAs()
    {
        return 'new-chat-message';
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'roomId' => $this->roomId
        ];
    }
}
