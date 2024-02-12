<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ShowHistoryController;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\ShowAchievementsController;

// Маршруты для UserController
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/username', [UserController::class, 'username']);

// Маршруты для GameController
Route::post('/choose-game', [GameController::class, 'chooseGame']);
Route::get('/play-2048', [GameController::class, 'play2048']);
Route::get('/play-sudoku', [GameController::class, 'playSudoku']);

// Маршруты для HistoryController
Route::post('/add-game-history', [HistoryController::class, 'addGameHistory']);
Route::get('/show-game-history', [ShowHistoryController::class, 'showGameHistory']);

// Маршруты для AchievementsController
Route::get('/check-achievements', [AchievementsController::class, 'checkAchievements']);

// Маршруты для ShowAchievementsController
Route::get('/show-user-achievements', [ShowAchievementsController::class, 'showUserAchievements']);

// Маршрут для обработки AJAX-запроса авторизации
Route::post('/ajax-login', [AuthController::class, 'ajaxLogin'])->name('ajax.login');

