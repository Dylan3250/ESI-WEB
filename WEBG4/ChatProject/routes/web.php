<?php

use App\Http\Controllers\ChatCtrl;
use App\Http\Controllers\ConnectionCtrl;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

Route::middleware("auth")->group(function () {
    Route::get('/logout', [ConnectionCtrl::class, 'logout']);
    Route::get('/chat/{chatRoomId}', [ChatCtrl::class, 'show'])->where('chatRoomId', '[0-9]+');
    Route::get('/channels', [ChatCtrl::class, 'index']);
});

Route::middleware("guest")->group(function () {
    Route::get('/login', [ConnectionCtrl::class, 'index'])->name("login");
    Route::post('/login', [ConnectionCtrl::class, 'authenticate']);
});
