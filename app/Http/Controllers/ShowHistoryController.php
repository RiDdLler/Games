<!-- <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameHistory;

class ShowHistoryController extends Controller
{
    // Просмотр истории сыгранных игр
    public function showGameHistory(Request $request) {
        // Получение данных об истории игр текущего пользователя
        $userHistory = GameHistory::where('user_id', auth()->id())->get();

        return ['userHistory' => $userHistory];
    }
}
 -->