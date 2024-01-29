<?php

use Illuminate\Http\Request;
use App\Models\UserAchievement;

class AchievementsController extends Controller
{
    // Значения порогов достижений для различных игр
    protected $highScore2048Threshold;
    protected $sudokuAchievementThreshold;

    /**
     * Конструктор класса AchievementsController.
     */
    public function __construct() {
        // Инициализация значений порогов достижений
        $this->highScore2048Threshold = 2048; // Порог для высокого счета в "2048"
        $this->sudokuAchievementThreshold = 5; // Порог для достижения в судоку
    }

    /**
     * Проверяет выполнение условий для достижений пользователя.
     *
     * @param int $userScore2048 Очки пользователя в игре "2048".
     * @param int $userSudokuScore Очки пользователя в игре "Судоку".
     */
    public function checkAchievements($userScore2048, $userSudokuScore) {
        // Проверка условий достижения для игры "2048"
        if ($userScore2048 >= $this->highScore2048Threshold) {
            UserAchievement::create([
                'user_id' => auth()->id(),
                'achievement' => 'High Score in 2048',
            ]);
        }

        // Проверка условий достижения для игры в судоку
        if ($userSudokuScore >= $this->sudokuAchievementThreshold) {
            UserAchievement::create([
                'user_id' => auth()->id(),
                'achievement' => 'Sudoku Master',
            ]);
        }
    }

    /**
     * Отображает достижения текущего пользователя.
     *
     * @return \Illuminate\View\View Возвращает представление с достижениями пользователя.
     */
    public function showUserAchievements() {
        // Получение достижений текущего пользователя
        $userAchievements = UserAchievement::where('user_id', auth()->id())->get();

        // Отображение достижений пользователя
        return view('user_achievements', ['userAchievements' => $userAchievements]);
    }
}

