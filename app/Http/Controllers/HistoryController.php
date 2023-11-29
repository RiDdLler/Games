<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Models\GameHistory; // Подставьте вашу модель для истории игр

class HistoryController extends Controller{
    // Добавление данных об игре в базу данных
    public function addGameHistory(Request $request) {

        // Получение данных об игре
        $gameType = $request->input('game_type');
        $score = $request->input('score');

        // Создание записи в таблице истории игр
        GameHistory::create([
            'user_id' => auth()->id(), // Предполагается, что у вас есть аутентификация
            'game_type' => $gameType,
            'score' => $score,
        ]);

        return redirect('/dashboard')->with('success', 'Данные об игре успешно сохранены.');
    }
}
