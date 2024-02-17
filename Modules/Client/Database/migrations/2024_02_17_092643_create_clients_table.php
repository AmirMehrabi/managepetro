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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('primary_email')->unique();
            $table->string('primary_phone')->unique();
            $table->string('secondary_email');
            $table->string('secondary_phone');
            $table->string('password');
            $table->boolean('mail_notification')->default(0);
            $table->boolean('sms_notification')->default(0);
            $table->boolean('is_organization')->default(0);
            $table->string('organization_name')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
