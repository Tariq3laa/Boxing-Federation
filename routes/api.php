<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/login', 'CoachController@login');
Route::middleware('api')->get('coachs/verify', 'CoachController@verify');
Route::middleware('api')->get('tecs/verify', 'TecController@verify');
