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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
                
            $table->string('shipping_name');
            $table->string('shipping_email')->unique();
            $table->string('shipping_phone')->nullable();
            $table->string('post_code');
            $table->string('state_name');
            $table->text('shipping_address')->nullable();
            $table->text('notes')->nullable();

            $table->integer('stripe')->nullable();
            $table->integer('cash')->nullable();
            $table->integer('card')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
