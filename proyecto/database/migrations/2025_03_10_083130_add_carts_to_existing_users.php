<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $users = User::doesntHave('cartRelation')->get(); // 👈 Cambiado a cartRelation

        foreach ($users as $user) {
            $user->cartRelation()->create(); // 👈 Usar la relación real
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('existing_users', function (Blueprint $table) {
            //
        });
    }
};
