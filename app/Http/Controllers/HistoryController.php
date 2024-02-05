<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameHistory;

class HistoryController extends Controller
{
    // Добавление данных об игре в базу данных
    public function addGameHistory(Request $request)
    {
        // Получение данных об игре
        $gameType = $request->game_type;
        $score = $request->score;

        // Создание записи в таблице истории игр
        $gameHistory = GameHistory::create([
            'user_id' => auth()->id(),
            'game_type' => $gameType,
            'score' => $score,
        ]);

        return $gameHistory;
    }

    // Просмотр истории сыгранных игр
    

    
}
