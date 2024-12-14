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
        Schema::create('reunions', function (Blueprint $table) {
            $table->id();
            $table->String("comentario");
            $table->enum('estado', ['aceptado', 'rechazado', 'pendiente'])->default('pendiente');
            $table->timestamp('fecha-hora-inicio');
            $table->timestamp('fecha-hora-fin');
            $table->unsignedBigInteger('emisor_id')->nullable();
            $table->foreign('emisor_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('receptor_id')->nullable();
            $table->foreign('receptor_id')->references('id')->on('users')->onDelete('cascade');
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
