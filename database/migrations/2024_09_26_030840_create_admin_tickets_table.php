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
        Schema::create('admin_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_ticket_id')->constrained()->onDelete('cascade');
            $table->string('review')->nullable();
            $table->enum('status', ['pending', 'open', 'closed', 'in-progress'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_tickets');
    }
};
