<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    class UserController {
        // Регистрация нового пользователя
        public function register(Request $request) {
            $this->validate($request, [
                'login' => 'required|string|max:255',
               
                'password' => 'required|string|min:3',
            ]);
    
            // Создание нового пользователя
            $user = User::create([
                'login' => $request->input('login'),
    
                'password' => bcrypt($request->input('password')),
            ]);
    
            // Дополнительная логика, например, отправка письма для подтверждения регистрации
    
            return redirect('/')->with('success', 'Регистрация успешна. Войдите в систему.');
        }
    
        // Вход пользователя в систему
        public function login(Request $request) {
            // Валидация данных
            $this->validate($request, [
                'login' => 'required|string|email|max:255',
                'password' => 'required|string|min:3',
            ]);
    
            // Попытка входа пользователя
            if (auth()->attempt(['login' => $request->input('login'), 'password' => $request->input('password')])) {
                return redirect('/dashboard')->with('success', 'Вход выполнен успешно.');
            } else {
                return redirect('/')->with('error', 'Неверные учетные данные. Попробуйте еще раз.');
            }
        }
    
        // Выход пользователя из системы
        public function logout() {
            auth()->logout();
            return redirect('/')->with('success', 'Вы успешно вышли из системы.');
        }
    
        // Изменение пароля пользователя
        public function changePassword(Request $request) {
            // Валидация данных
            $this->validate($request, [
                'current_password' => 'required|string|min:3',
                'new_password' => 'required|string|min:3|confirmed',
            ]);
    
            // Получение текущего пользователя
            $user = auth()->user();
    
            // Проверка текущего пароля
            if (Hash::check($request->input('current_password'), $user->password)) {
                // Изменение пароля
                $user->update(['password' => bcrypt($request->input('new_password'))]);
    
                return redirect('/profile')->with('success', 'Пароль успешно изменен.');
            } else {
                return redirect('/profile')->with('error', 'Неверный текущий пароль. Попробуйте еще раз.');
            }
        }
    
        // Просмотр профиля пользователя
        public function viewProfile() {
            // Получение текущего пользователя
            $user = auth()->user();
    
            return view('profile', ['user' => $user]);
        }
    }
    
}
