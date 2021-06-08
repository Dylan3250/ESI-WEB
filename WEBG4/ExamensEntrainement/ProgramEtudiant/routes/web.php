<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CtrlProgram;

Route::redirect("/", "/accueil");
Route::get('/accueil', [CtrlProgram::class, 'index']);
