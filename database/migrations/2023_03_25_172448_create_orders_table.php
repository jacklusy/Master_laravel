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
               
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('state_id');

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('adress')->nullable();
            $table->string('post_code')->nullable();
            $table->text('notes')->nullable();
            $table->float('amount',8,2);
            $table->string('order_number')->nullable();
            $table->string('invoice_no');

            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');

            $table->string('delivered_date')->nullable();
            $table->string('cancel_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_reason')->nullable();
            $table->string('status'); 

            
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
