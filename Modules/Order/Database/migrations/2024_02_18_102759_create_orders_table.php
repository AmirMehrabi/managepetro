<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug');
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('truck_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('pipeline_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->decimal('price_per_unit', 10, 2);
            $table->enum('status', ['pending', 'approved', 'in_progress', 'delivered'])->default('pending');
            $table->enum('type', ['gas', 'coal', 'oil', 'diesel', 'other'])->default('gas');
            $table->dateTime('expected_delivery_date')->nullable();

            $table->dateTime('approved_date')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
