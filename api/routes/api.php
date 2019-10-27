<?php

use Illuminate\Support\Facades\Route;

Route::get('/conta', 'ContaController@get');
Route::post('/conta', 'ContaController@post');
