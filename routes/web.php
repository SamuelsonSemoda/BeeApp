<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BeehiveController;
use App\Http\Controllers\RecordController;

Route::get('/', [LocationController::class,'index'])->name('locations.index');

Route::post('/locations', [LocationController::class,'store'])->name('locations.store');

Route::get('/locations/{location}', [LocationController::class,'show'])->name('locations.show');

Route::delete('/locations/{location}', [LocationController::class,'destroy'])->name('locations.destroy');

Route::post('/beehives',[BeehiveController::class,'store'])->name('beehives.store');

Route::get('/beehives/{beehive}',[BeehiveController::class,'show'])->name('beehives.show');

Route::put('/beehives/{beehive}',[BeehiveController::class,'update'])->name('beehives.update');

Route::delete('/beehives/{beehive}',[BeehiveController::class,'destroy'])->name('beehives.destroy');

Route::post('/beehives/{beehive}/records',[RecordController::class,'store'])->name('records.store');

Route::put('/records/{record}',[RecordController::class,'update'])->name('records.update');

Route::delete('/records/{record}',[RecordController::class,'destroy'])->name('records.destroy');
