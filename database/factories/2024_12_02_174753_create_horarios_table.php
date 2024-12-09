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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->enum('dia-semana', ['lunes', 'martes', 'miercoles', 'jueves', 'viernes'])->default('lunes');
            $table->enum('hora', ['1', '2', '3', '4', '5', '6'])->default('1');
            $table->unsignedBigInteger('profesor_id');
            $table->unsignedBigInteger('asignatura_id');
            $table->foreign('profesor_id')->references('id')->on('users');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->primary(['dia-semana', 'hora', 'profesor_id', 'asignatura_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
