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
        Schema::create('ciclo_usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreign('ciclo-id')->references('id')->on('ciclos');
            $table->foreign('usuario-id')->references('id')->on('users');
            $table->timestamps('fecha-matricula');

            $table->primary(['ciclo-id', 'usuario-id', 'fecha-matricula']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciclo_usuarios');
    }
};
