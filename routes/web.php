<?php

use App\Http\Controllers\OCRController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [OCRController::class, 'index']);
Route::post('/process', [OCRController::class, 'process'])->name('process');
