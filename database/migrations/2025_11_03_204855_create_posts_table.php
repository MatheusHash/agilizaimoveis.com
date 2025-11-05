<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable("posts")) {
            Schema::create("posts", function (Blueprint $table) {
                $table->id();
                $table->string("title", 256);
                $table->string("content", 1000);
                $table
                    ->string("image", 100)
                    ->default("imgs/post/AGILIZAIMOVEIS_POST.jpg");
                $table->string("linkPost", 1000);
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists("posts");
    }
};
