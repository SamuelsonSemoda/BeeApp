<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeehiveController;
use App\Http\Controllers\RecordController;

Route::get('/', [BeehiveController::class, 'index'])->name('beehives.index'); // seznam stanovišť
Route::get('/stanoviste/{slug}', [BeehiveController::class, 'byStanoviste'])->name('beehives.byStanoviste'); // úly pro dané stanoviště

// CRUD pro úly
Route::post('/beehives', [BeehiveController::class, 'store'])->name('beehives.store');
Route::get('/beehives/{beehive}', [BeehiveController::class, 'show'])->name('beehives.show');
Route::put('/beehives/{beehive}', [BeehiveController::class, 'update'])->name('beehives.update');
Route::delete('/beehives/{beehive}', [BeehiveController::class, 'destroy'])->name('beehives.destroy');

// CRUD pro záznamy
Route::post('/beehives/{beehive}/records', [RecordController::class, 'store'])->name('records.store');
Route::put('/records/{record}', [RecordController::class, 'update'])->name('records.update');
Route::delete('/records/{record}', [RecordController::class, 'destroy'])->name('records.destroy');
