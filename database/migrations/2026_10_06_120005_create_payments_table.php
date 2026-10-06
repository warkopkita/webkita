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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->string('transaction_id')->nullable();
            $table->string('gateway')->default('midtrans');
            $table->string('payment_type')->nullable(); // 'qris', 'bank_transfer', etc.
            $table->decimal('amount', 12, 2);
            $table->string('status')->default('pending'); // 'pending', 'settlement', 'expire', 'cancel', 'deny'
            $table->string('snap_token')->nullable();
            $table->json('raw_payload')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
