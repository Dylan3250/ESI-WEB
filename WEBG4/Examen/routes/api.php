<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CtrlAPICommits;

Route::get('/repositories/{id_repo}', [CtrlAPICommits::class, 'getRepository'])->where('id_repo', '[0-9]+');
