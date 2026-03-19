<?php
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\BeehiveController;
use App\Http\Controllers\Api\RecordController;

Route::get('/locations', [LocationController::class, 'index']);

Route::get('/locations/{id}/beehives', [BeehiveController::class, 'byLocation']);
Route::get('/beehives/{id}', [BeehiveController::class, 'show']);

Route::post('/beehives', [BeehiveController::class, 'store']);
Route::delete('/beehives/{beehive}', [BeehiveController::class, 'destroy']);

Route::get('/beehives/{id}/records', [RecordController::class, 'index']);

Route::post('/records', [RecordController::class, 'store']);
Route::put('/records/{record}', [RecordController::class, 'update']);
Route::delete('/records/{record}', [RecordController::class, 'destroy']);
