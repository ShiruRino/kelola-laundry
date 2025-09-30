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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreignId('outlet_id')->references('id')->on('outlets');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->enum('payment_status', ['pending','paid'])->default('pending');
            $table->enum('status', ['pending', 'processing', 'done'])->default('pending');
            $table->timestamp('done_at')->nullable();
            $table->boolean('picked_up')->default(false);
            $table->integer('vat_fee')->default(0);
            $table->integer('late_fee')->default(0);
            $table->integer('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
