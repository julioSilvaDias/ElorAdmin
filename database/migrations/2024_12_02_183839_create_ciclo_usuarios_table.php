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
        Schema::create('ciclo_usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->timestamp('fecha_matricula');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('ciclo_id');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->primary(['id', 'ciclo_id', 'usuario_id', 'fecha_matricula']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciclo_usuario');
    }
};
