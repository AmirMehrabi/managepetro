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

        // Generate invoice number, calculate total amount, issue date, due date, etc.
        $invoiceData = [
            'order_id' => $order->id,
            'invoice_number' => 'INV-' . $order->id, // Example invoice number format
            'total_amount' => 100,
            'issue_date' => now(),
            'due_date' => now()->addDays(30), // Example due date, 30 days from issue date
            'status' => 'unpaid', // Set initial status
        ];

        Invoice::create($invoiceData);
    }
}
