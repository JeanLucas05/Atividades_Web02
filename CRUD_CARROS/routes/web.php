<?php

use App\Models\Carro;
use App\Http\Controllers\CarroController;
use Illuminate\Support\Facades\Route;

Route::resource('carros', CarroController::class);

Route::get('/', function () {
    return view('welcome');
});
