<?php

use Illuminate\Support\Facades\Route;

Route::get('/conta', 'ContaController@get');
Route::post('/conta', 'ContaController@post');
Route::get('/conta/historico', 'ContaController@history');
