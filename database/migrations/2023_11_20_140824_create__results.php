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
        Schema::create('Results', function (Blueprint $table) {    
            $table->id();
            $table->integer('id пользователя');
            $table->integer('id игры');
            $table->string('Результат матча');
            $table->integer('Общий счет');
            $table->dateTime('Время начала игры');
            $table->dateTime('Время конца игры');
            $table->string('Лидеры');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
};