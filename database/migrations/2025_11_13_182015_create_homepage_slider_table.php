<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_slider', function (Blueprint $table) {
            $table->id();
            $table->string('path'); // Caminho da imagem
            $table->integer('order')->default(0); // Ordem no carrossel
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_slider');
    }
};
