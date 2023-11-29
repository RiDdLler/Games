<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Регистрация нового пользователя
    public function register(Request $request)
    {
        // Валидация входных данных с использованием Laravel's Validator
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:3',
        ]);

        // Проверка наличия ошибок валидации
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Создание нового пользователя
        $user = User::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Отправка успешного ответа
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }
}
