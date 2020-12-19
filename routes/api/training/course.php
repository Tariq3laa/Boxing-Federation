<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('/course', 'TrainingController');
Route::get('/course/{course}/trainees', 'TrainingController@courseTrainees')->name('course.trainees');
