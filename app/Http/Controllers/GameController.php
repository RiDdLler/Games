<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    // Выбор игры
    public function chooseGame(Request $request)
    {
        // Получение выбора пользователя
        $games = Game::all();
        return games;

        // Вывод списка игр из базы данных
       
    }
}
