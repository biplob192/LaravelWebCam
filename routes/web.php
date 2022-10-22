<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebcamController;
use App\Http\Controllers\ClientController;

Route::get('/', [WebcamController::class, 'index']);
Route::get('webcam', [WebcamController::class, 'index']);
Route::post('webcam', [WebcamController::class, 'store'])->name('webcam.capture');

Route::get('clients/{id}', [ClientController::class, 'show'])->name('client.profile');
