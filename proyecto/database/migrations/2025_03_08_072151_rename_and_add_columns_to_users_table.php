<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Cambia el nombre de la columna 'name' a 'nombre'
            $table->renameColumn('name', 'nombre');

            // Agrega las nuevas columnas
            $table->string('apellido')->nullable();
            $table->integer('cedula')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('rol')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Reversa los cambios (en orden inverso a como se aplicaron)
            $table->dropColumn(['apellido', 'cedula', 'telefono']);
            $table->renameColumn('nombre', 'name');
        });
    }
};