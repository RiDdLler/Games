<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Http\Controllers\Controller; 

class GameController extends Controller
{
    // Выбор игры
    public function chooseGame(Request $request)
    {
        // Получение выбора пользователя
        $games = Game::all();
        return response()->json($games);

        // Вывод списка игр из базы данных
       
    }

}
