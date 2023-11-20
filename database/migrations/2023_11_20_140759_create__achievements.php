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
        Schema::create('Achievements', function (Blueprint $table) {
            $table->id('id ачивки'); 
            $table->string('имя ачивки'); 
            $table->integer('id пользователя');
            $table->integer('id игры');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Achievements');
    }
};