<?php

use App\Models\Championship;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('coachs/verify', 'CoachController@verify');
Route::get('tecs/verify', 'TecController@verify');
