<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowHistoryController extends Controller
{
    // Просмотр истории сыгранных игр
    public function showGameHistory() {
        // Получение данных об истории игр текущего пользователя
        $userHistory = GameHistory::where('user_id', auth()->id())->get();

        return view('game_history', ['userHistory' => $userHistory]);
    }
}