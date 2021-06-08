<?php

use App\Http\Controllers as Ctrl;
use App\Http\Controllers\TodoCtrl;
use App\Http\Controllers\MessageCtrl;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/todos');

// Route::get('/hello', function () {
//     return 'Hello World!';
// });

Route::get('/hello/{name?}', [Ctrl\HelloCtrl::class, 'index'])->where('name', '[A-Za-z]+');

Route::get('/todos', [TodoCtrl::class, 'index']);
Route::post('/todos', [TodoCtrl::class, 'store']);
Route::get('/todos/{id}', [TodoCtrl::class, 'show'])->where('id', '[0-9]+');

Route::get('/messages', [MessageCtrl::class, 'index']);
Route::get('/messages/{id}', [MessageCtrl::class, 'param'])->where('id', '[0-9]+');
