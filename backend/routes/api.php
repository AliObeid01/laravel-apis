<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api_controller;


Route::get("/placeValue-api/{num?}",[api_controller::class, 'placeValue']);
Route::get("/evaluteExpr-api/{string?}",[api_controller::class, 'evaluteExpr']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
