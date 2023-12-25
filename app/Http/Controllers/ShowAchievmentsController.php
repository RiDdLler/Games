<!-- <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowAchievmentsController extends Controller
{
    // Просмотр достижений пользователя
    public function showUserAchievements() {
        // Получение достижений текущего пользователя
        $userAchievements = UserAchievement::where('user_id', auth()->id())->get();

        return view('user_achievements', ['userAchievements' => $userAchievements]);
        // Подставьте ваше представление и настройте его соответствующим образом
    }
} -->

