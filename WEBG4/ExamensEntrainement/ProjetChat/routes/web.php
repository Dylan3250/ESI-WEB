<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatCtrl;

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
Route::redirect("/", "accueil");

Route::get('/accueil', [ChatCtrl::class, 'index']);
Route::get('/chat/{idRoom}', [ChatCtrl::class, 'showMessages']);
Route::post('/login', [ChatCtrl::class, 'login']);
