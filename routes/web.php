<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeehiveController;
use App\Http\Controllers\RecordController;

Route::get('/', [BeehiveController::class, 'index'])->name('beehives.index');
Route::get('/stanoviste/{slug}', [BeehiveController::class, 'byStanoviste'])->name('beehives.byStanoviste');

Route::post('/beehives', [BeehiveController::class, 'store'])->name('beehives.store');
Route::get('/beehives/{beehive}', [BeehiveController::class, 'show'])->name('beehives.show');
Route::put('/beehives/{beehive}', [BeehiveController::class, 'update'])->name('beehives.update');
Route::delete('/beehives/{beehive}', [BeehiveController::class, 'destroy'])->name('beehives.destroy');

Route::post('/beehives/{beehive}/records', [RecordController::class, 'store'])->name('records.store');
Route::put('/records/{record}', [RecordController::class, 'update'])->name('records.update');
Route::delete('/records/{record}', [RecordController::class, 'destroy'])->name('records.destroy');

