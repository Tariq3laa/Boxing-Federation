<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('/category', 'GalleryCategoryController');
Route::get('/category/{category}/gallery', 'GalleryCategoryController@categoryGallery')->name('category.gallery');
