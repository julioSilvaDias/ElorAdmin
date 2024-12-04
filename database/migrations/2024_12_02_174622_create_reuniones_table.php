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
        Schema::create('reuniones', function (Blueprint $table) {
            $table->id();
            $table->String("comentario");
            $table->enum('estado', ['aceptado', 'rechazado', 'pendiente'])->default('pendiente');
            $table->timestamp('fecha-hora-inicio');
            $table->timestamp('fecha-hora-fin');
            $table->foreign('emisor-id')->references('id')->on('users');
            $table->foreign('receptor-id')->references('id')->on('users');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reuniones');
    }
};

//reunions
