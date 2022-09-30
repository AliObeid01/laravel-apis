<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api_controller;


Route::get("/placeValue-api/{num?}",[api_controller::class, 'placeValue']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
