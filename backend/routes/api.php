<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api_controller;


Route::get("/placeValue-api/{num?}",[api_controller::class, 'placeValue']);
Route::get("/evaluateExpr-api/{string?}",[api_controller::class, 'evaluateExpr']);
Route::get("/binary-api/{string?}",[api_controller::class, 'binary']);
Route::get("/sortString-api/{string?}",[api_controller::class, 'sortString']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
