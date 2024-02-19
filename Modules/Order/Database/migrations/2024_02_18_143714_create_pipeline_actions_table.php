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
        Schema::create('pipeline_actions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('order');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('pipeline_id');
            $table->foreign('pipeline_id')
                  ->references('id')
                  ->on('pipelines')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pipeline_actions');
    }
};
