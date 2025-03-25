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
    Schema::table('carts', function (Blueprint $table) {
        if (!Schema::hasColumn('carts', 'items_count')) {
            $table->unsignedInteger('items_count')->default(0)->after('user_id');
        }
    });
}

public function down()
{
    Schema::table('carts', function (Blueprint $table) {
        if (Schema::hasColumn('carts', 'items_count')) {
            $table->dropColumn('items_count');
        }
    });
}
};
