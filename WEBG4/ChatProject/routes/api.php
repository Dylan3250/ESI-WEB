<?php

use App\Http\Controllers\APIChatCtrl;
use Illuminate\Support\Facades\Route;

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

Route::get('/channels', [APIChatCtrl::class, 'show']);
Route::post('/channels/{chatRoomId}/messages', [APIChatCtrl::class, 'store'])->where('chatRoomId', '[0-9]+');
Route::get('/channels/{chatRoomId}/messages', [APIChatCtrl::class, 'param'])->where('chatRoomId', '[0-9]+');
