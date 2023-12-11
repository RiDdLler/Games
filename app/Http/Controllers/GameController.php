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
        $selectedGame = $request->input('game');

        // Вывод списка игр из базы данных
        $games = Game::all();

        // Перенаправление на страницу выбранной игры
        if ($selectedGame == '2048') {
            return redirect('/2048')->with('info', 'Добро пожаловать в игру 2048!');
        } elseif ($selectedGame == 'sudoku') {
            return redirect('/sudoku')->with('info', 'Добро пожаловать в игру Судоку!');
        }
    }

    // Страница игры 2048
    public function play2048()
    {
        // Логика для отображения страницы игры 2048
        return view('2048'); // Предполагается, что у вас есть шаблон Blade для этой страницы
    }

    // Страница игры Судоку
    public function playSudoku()
    {
        // Логика для отображения страницы игры Судоку
        return view('sudoku'); // Предполагается, что у вас есть шаблон Blade для этой страницы
    }
}
