<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BooksControllerApi;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('books', [BooksControllerApi::class , 'index']);
Route::post('books', [BooksControllerApi::class , 'create']);
Route::get('books/{id}', [BooksControllerApi::class , 'show']);
Route::put('books/{id}', [BooksControllerApi::class , 'update']);
Route::delete('books/{id}', [BooksControllerApi::class , 'destroy']);

