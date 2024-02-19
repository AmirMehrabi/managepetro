<?php

namespace Modules\Order\App\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Order\App\Models\Order;

class OrderCreated
{
    use SerializesModels;

    public $order;

    /**
     * Create a new event instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the channels the event should be broadcast on.
     */
    public function broadcastOn(): array
    {
        return [];
    }
}
