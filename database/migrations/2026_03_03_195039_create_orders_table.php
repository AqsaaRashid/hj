<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();

        $table->string('order_number')->unique();

        $table->string('customer_name');
        $table->string('customer_email');
        $table->string('customer_phone');

        $table->string('street');
        $table->string('city');
        $table->string('zip');

        $table->decimal('subtotal', 10, 2);
        $table->decimal('discount', 10, 2)->default(0);
        $table->decimal('total', 10, 2);

        $table->string('status')->default('pending'); // pending, paid, cancelled

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
