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
            $table->timestamp('fecha-matricula');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('ciclo-id');
            $table->foreign('ciclo-id')->references('id')->on('ciclos');
            $table->unsignedBigInteger('usuario-id');
            $table->foreign('usuario-id')->references('id')->on('users');
            $table->primary(['ciclo-id', 'usuario-id', 'fecha-matricula']);
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
