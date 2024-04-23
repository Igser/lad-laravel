<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/info', function (Request $request) {
    dd($request);
});
Route::post('/info', function (Request $request) {
    dd($request);
});
