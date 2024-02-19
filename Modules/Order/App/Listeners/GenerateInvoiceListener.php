<?php

namespace Modules\Order\App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Order\App\Events\OrderCreated;
use Modules\Invoice\App\Models\Invoice;

class GenerateInvoiceListener
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
    public function handle($event): void
    {
        $order = $event->order;

        
        $invoiceData = [
            'order_id' => $order->id,
            'invoice_number' => 'ORD-' . $order->id, // Example invoice number format
            'total_amount' => $order->price_per_unit * $order->amount,
            'issue_date' => now(),
            'due_date' => now()->addDays(7), 
            'status' => 'unpaid', 
        ];

        Invoice::create($invoiceData);
    }
}
