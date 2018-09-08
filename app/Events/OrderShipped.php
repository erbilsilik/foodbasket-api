<?php

namespace App\Events;

//use App\Order;
use App\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderShipped implements ShouldBroadcast
{
    use SerializesModels;

    public $order;

    /**
     * OrderShipped constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['test-channel'];
//        return new PrivateChannel('restaurant.'.$this->order->restaurant_id);
    }

    public function broadcastAs()
    {
        return 'server.created';
    }

    public function broadcastWith()
    {
        return $this->order;
    }
}
