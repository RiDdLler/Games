<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// Миграция для таблицы "Пользователи"
    public function up(): void
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->id('id пользователя');
            $table->string('Логин');
            $table->string('Пароль');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Users');
    }
};

