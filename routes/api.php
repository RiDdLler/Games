<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CabinetController;
use Illuminate\Support\Facades\Route;
use App\Models\Cabinet;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/hi',[CabinetController::class, 'hello']);
Route::get('/get',[CabinetController::class, 'get']);
Route::post('/post',[CabinetController::class, 'post']);
Route::put('/put',[CabinetController::class, 'put']);
Route::delete('/delete',[CabinetController::class, 'delete']);
Route::get('/get_cabinet',[CabinetController::class, 'get_cabinet']);
Route::get('/get_c',[CabinetController::class, 'get_c']);


Route::get('/cabinet/{id}', [CabinetController::class, 'getItemById']);
Route::put('/cabinet/{id}', [CabinetController::class, 'updateCabinet']);
Route::delete('/cabinet/{id}', [CabinetController::class, 'deleteCabinet']);


Route::post('/createCabinet',[CabinetController::class, 'create']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
