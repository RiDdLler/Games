<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAchievement; // Assuming you have a model for UserAchievement

class AchievementsController extends Controller
{
    // Проверка условий для выполнения достижений
    public function checkAchievements() {
        // Предположим, что у вас есть логика проверки достижений
        // и ваши условия для достижений задаются где-то в вашем приложении

        // Пример: Допустим, пользователь достиг высокого счета в игре "2048"
        $highScore2048 = 2048; // Порог для высокого счета в "2048"
        $userScore2048 = 12000; // Полученный пользователем счет в "2048"

        // Проверка условий достижения для игры "2048"
        if ($userScore2048 >= $highScore2048) {
            // Если условие выполнено, создаем запись о достижении пользователя
            UserAchievement::create([
                'user_id' => auth()->id(),
                'achievement' => 'High Score in 2048',
            ]);

            // Дополнительная логика, например, обновление интерфейса или запись в лог
        }

        // Добавляем условия для достижений в судоку
        $sudokuAchievement = 5; // Порог для достижения в судоку
        $userSudokuScore = 6; // Полученный пользователем счет в судоку

        // Проверка условий достижения для игры в судоку
        if ($userSudokuScore >= $sudokuAchievement) {
            // Если условие выполнено, создаем запись о достижении пользователя
            UserAchievement::create([
                'user_id' => auth()->id(),
                'achievement' => 'Sudoku Master',
            ]);

            // Дополнительная логика, например, обновление интерфейса или запись в лог
        }
    }
}

//скрипт ачивок раз в ~10мин schedule
//вывод чивок
