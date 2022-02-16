<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\LoginedController;
use App\Http\Controllers\GetDetailController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RestaurantController::class, 'index']);
Route::get('/result', [RestaurantController::class, 'result']);

Route::get('/logined', [LoginedController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/logined/result', [LoginedController::class, 'result']);

// レストランの詳細(ログイン前)
Route::get('/detail/{id}', [GetDetailController::class, 'getdetail'])->name('getdetail');
// レストランの詳細(ログイン後)
Route::get('/logined/detail/{id}', [GetDetailController::class, 'logined_getdetail'])->name('logined_getdetail');

// レストランの予約送信(ログイン前)
Route::post('/offer', [ReservationController::class, 'offer']);
// レストランの予約送信(ログイン後)
Route::post('/complete', [ReservationController::class, 'complete'])->middleware('auth');
