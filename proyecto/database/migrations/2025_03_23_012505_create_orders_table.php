<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Relación con usuarios
            $table->decimal('total', 10, 2); // Total del pedido
            $table->string('payment_reference'); // Referencia bancaria
            $table->string('status')->default('pending'); // Estado del pedido
            $table->json('shipping_info'); // Datos de envío en JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};