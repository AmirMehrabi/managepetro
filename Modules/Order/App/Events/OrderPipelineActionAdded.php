<?php

namespace Modules\Order\App\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Order\App\Models\Order;
use Modules\Order\App\Models\PipelineAction;

class OrderPipelineActionAdded
{
    use SerializesModels;

    public $order;
    public $pipelineAction;

    /**
     * Create a new event instance.
     */
    public function __construct(Order $order, PipelineAction $pipelineAction)
    {
        $this->order = $order;
        $this->pipelineAction = $pipelineAction;
    }

    /**
     * Get the channels the event should be broadcast on.
     */
    public function broadcastOn(): array
    {
        return [];
    }
}
