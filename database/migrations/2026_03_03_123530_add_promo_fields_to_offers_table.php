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
    Schema::table('offers', function (Blueprint $table) {
        $table->string('promo_code')->unique()->nullable();
        $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage');
        $table->decimal('discount_value', 8, 2)->default(0);
        $table->decimal('min_order_amount', 8, 2)->nullable();
        $table->timestamp('expires_at')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            //
        });
    }
};
