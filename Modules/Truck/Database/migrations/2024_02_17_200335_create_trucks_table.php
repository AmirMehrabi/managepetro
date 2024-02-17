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
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            // Because we don't have a Driver model to use a relationship here:
            $table->string('driver_name');
            $table->string('plate')->unique();
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->integer('capacity');
            $table->enum('status', ['active', 'inactive', 'under_maintenance'])->default('active');
            $table->unsignedBigInteger('mileage')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
