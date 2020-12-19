<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('/trainee', 'TraineeController');
Route::get('/trainee/{trainee}/trainings', 'TraineeController@traineeTrainings')->name('trainee.trainings');
