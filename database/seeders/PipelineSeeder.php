<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Order\App\Models\Pipeline;
use Modules\Order\App\Models\PipelineAction;

class PipelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Create a Pipeline
        $pipeline = Pipeline::create([
            'name' => 'Sample Pipeline',
            'order' => 1,
            'description' => 'Example pipeline for demonstration',
        ]);

        // Define actions for the Pipeline
        $actions = [
            ['name' => 'Ordered', 'order' => 1, 'description' => 'The product has been ordered.'],
            ['name' => 'Approved by Customer', 'order' => 2, 'description' => 'The order has been approved by the customer.'],
            ['name' => 'Invoice Paid', 'order' => 3, 'description' => 'The invoice for the order has been paid.'],
            ['name' => 'En Route', 'order' => 4, 'description' => 'The order is en route for delivery.'],
            ['name' => 'Delivered to Customer', 'order' => 5, 'description' => 'The order has been successfully delivered to the customer.'],
        ];

        // Create Pipeline actions
        foreach ($actions as $action) {
            PipelineAction::create([
                'name' => $action['name'],
                'order' => $action['order'],
                'description' => $action['description'],
                'pipeline_id' => $pipeline->id,
            ]);
        }
    }
}
