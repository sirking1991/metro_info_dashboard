<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BroadcastMessage
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $lguId;
    
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($lguId, $message)
    {
        $this->lguId = $lguId;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
        return ['lgu-' . $this->lguId];
    }

    public function broadcastAs()
    {
        return 'broadcast';
    }
}
