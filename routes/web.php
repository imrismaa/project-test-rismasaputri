<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('index', [IndexController::class, 'index'])->name('index');
