<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

class PrivateMessageTest extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $from;
    public $to;
    public $text;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->from = User::find(1);
        $this->to = array(2, 3, 4, 5, 6, 7, 8);
        $this->text = 'Bonjour les amis !';
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['test-private-message'];
    }
}
