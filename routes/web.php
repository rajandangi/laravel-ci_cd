<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Dummy route
Route::get('/dummy', function () {
    return 'Dummy route';
});