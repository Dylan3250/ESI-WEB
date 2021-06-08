<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CtrlCommits;

Route::get('/', [CtrlCommits::class, 'index']);
Route::get('/depots', [CtrlCommits::class, 'showDepots']);
