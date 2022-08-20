<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HistoryPaymentController;
use App\Http\Controllers\HistoryBetController;
use Illuminate\Support\Facades\Route;

/**
 * 用户鉴权API
 */
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('registerdaili',[RegisterController::class,'registerdaili']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group([
    'prefix' => 'history'
], function () {
    Route::resource('payments',HistoryPaymentController::class);
    Route::resource('bet',HistoryBetController::class);
    Route::get('banking',[HistoryPaymentController::class, 'banking']);
    Route::get('paymentsdaily',[HistoryPaymentController::class, 'historydaily']);
    Route::get('totaldaili',[HistoryPaymentController::class, 'doanhthu']);

});
