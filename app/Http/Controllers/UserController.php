<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller; 



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
            'password' => Hash::make($request->input('password')),
        ]);
        

        // Отправка успешного ответа
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    // Авторизация пользователя
    public function login(Request $request)
    {
        // Валидация входных данных с использованием Laravel's Validator
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Проверка наличия ошибок валидации
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Аутентификация пользователя
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            $token = $user->createToken(env('APP_NAME'))->plainTextToken;

            return response()->json(['message' => 'Login successful', 'user' => $user, 'access_token' => $token]);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }
}
