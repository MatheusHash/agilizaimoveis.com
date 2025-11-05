<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table("imoveis", function (Blueprint $table) {
            if (!Schema::hasColumn("imoveis", "oportunidade")) {
                $table
                    ->boolean("oportunidade")
                    ->nullable()
                    ->default(null)
                    ->after("ocultarValorParaCliente");
            }
        });
    }

    public function down(): void
    {
        Schema::table("imoveis", function (Blueprint $table) {
            if (Schema::hasColumn("imoveis", "oportunidade")) {
                $table->dropColumn("oportunidade");
            }
        });
    }
};
