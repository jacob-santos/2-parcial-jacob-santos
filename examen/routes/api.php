<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantaController;


Route::get('/plantas', [PlantaController::class, 'show']); 
Route::post('/plantas', [PlantaController::class, 'store']); 
Route::put('/plantas/{id}', [PlantaController::class, 'edit']); 
Route::delete('/plantas/{id}', [PlantaController::class, 'delete']); 
