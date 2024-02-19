<?php

namespace Modules\Order\App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Order\App\Events\OrderPipelineActionAdded;
use Modules\Truck\App\Models\Truck;


class UpdateOrderStatusOnPipelineActionAdded
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPipelineActionAdded $event): void
    {
        $order = $event->order;
        $pipelineAction = $event->pipelineAction;

        // Check if the added pipeline action triggers a status update
        switch ($pipelineAction->name) {
            case 'Approved by Customer':
                $order->status = 'approved';
                $order->approved_date = now();
                $order->save();
                break;
            case 'Invoice Paid':
                $order->invoice->status = 'paid';
                $order->invoice->save();
                break;
            case 'En Route':
                $order->status = 'in_progress';
                $order->save();

                // In future we will have a pool of "Active" trucks and we would assign the trucks to the orders with a fair assignment policy.
                $randomTruck = Truck::get()->random();
                $randomTruck->status = 'inactive';
                $randomTruck->save();

                $randomTruck->orders()->save($order);
                break;
            case 'Delivered to Customer':
                $order->status = 'delivered';
                $order->delivery_date = now();

                $truck = $order->truck;

                // Check if a truck is associated with the order
                if ($truck) {
                    // Update the truck status to "active"
                    $truck->status = 'active';
                    $truck->save();
                }

                $order->truck()->dissociate();
                $order->save();
                break;
        }
    }
}
