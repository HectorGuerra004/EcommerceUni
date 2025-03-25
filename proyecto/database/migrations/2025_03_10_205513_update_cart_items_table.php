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
        Schema::table('cart_items', function (Blueprint $table) {
            $table->renameColumn('stock', 'cantidad'); // Mejor nombre
            $table->foreignId('producto_id')->constrained()->after('id');
            $table->decimal('precio', 10, 2)->after('cantidad');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->unsignedInteger('items_count')->default(0)->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
