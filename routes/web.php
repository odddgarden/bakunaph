<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredictionController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/predict', [PredictionController::class, 'predictOutbreak']);
