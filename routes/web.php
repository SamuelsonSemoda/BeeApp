<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeehiveController;

Route::get('/', [BeehiveController::class, 'index'])->name('beehives.index');
Route::post('/beehives', [BeehiveController::class, 'store'])->name('beehives.store');
Route::delete('/beehives/{beehive}', [BeehiveController::class, 'destroy'])->name('beehives.destroy');

