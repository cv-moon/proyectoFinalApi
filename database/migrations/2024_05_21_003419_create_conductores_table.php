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
        Schema::create('conductores', function (Blueprint $table) {
            $table->id('id_conductor');
            $table->string('cedula', 10);
            $table->string('password');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('id_ruta');

            $table->foreign('id_ruta')->references('id_ruta')->on('rutas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductores');
    }
};
