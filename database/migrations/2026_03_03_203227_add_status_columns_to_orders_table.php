<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up()
{
    Schema::table('orders', function (Blueprint $table) {

        // How customer will pay
        $table->string('payment_method')->default('cod');

        // Is payment collected?
        $table->string('payment_status')->default('pending');

        // Kitchen workflow status
        $table->string('order_status')->default('pending');

    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn([
            'payment_method',
            'payment_status',
            'order_status'
        ]);
    });
}
};
