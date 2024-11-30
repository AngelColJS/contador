<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CounterController;

Route::get('/', function () {
    return view('welcome');
});


// Ruta para la página principal que muestra el contador
Route::get('/', [CounterController::class, 'showCounter'])->name('counter.show');

// Rutas para manejar el incremento y decremento del contador
Route::post('/counter/increment', [CounterController::class, 'increment'])->name('counter.increment');
Route::post('/counter/decrement', [CounterController::class, 'decrement'])->name('counter.decrement');
