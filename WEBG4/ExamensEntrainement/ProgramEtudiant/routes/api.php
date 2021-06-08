<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CtrlAPIProgram;

Route::get('/pae/students', [CtrlAPIProgram::class, 'show']);
Route::get('/pae/student/{id}', [CtrlAPIProgram::class, 'getInfoStudent']);
Route::get('/pae/student/{idProgram}/delete', [CtrlAPIProgram::class, 'delete']);
