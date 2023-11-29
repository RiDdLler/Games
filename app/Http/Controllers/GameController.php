<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    // Выбор игры
    public function chooseGame(Request $request) {
        // Валидация данных (если необходимо)
        // ...

        // Получение выбора пользователя
        $selectedGame = $request->input('game');

        // Дополнительная логика, если необходимо

        // Перенаправление на страницу выбранной игры
        if ($selectedGame == '2048') {
            return redirect('/2048')->with('info', 'Добро пожаловать в игру 2048!');
        } elseif ($selectedGame == 'sudoku') {
            return redirect('/sudoku')->with('info', 'Добро пожаловать в игру Судоку!');
        } 
    }
}

