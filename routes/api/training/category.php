<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('/training', 'TrainingCategoryController')->only('index', 'show');
