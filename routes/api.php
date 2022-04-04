<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/noPermitido', 'Api\UserController@usuarioNoPermitido')->name('noPermitido');

Route::post('/register', 'Api\UserController@register');
Route::post('/login', 'Api\UserController@login');
Route::get('/logout', 'Api\UserController@logout');
Route::get('/prueba', 'Api\UserController@prueba')->middleware('auth:api');
Route::apiResource('marca', 'MarcaController')->middleware('auth:api');
Route::apiResource('Mantencion', 'MantencionController')->middleware('auth:api');
Route::apiResource('Modelo', 'ModeloController');
Route::get('/tipo/{numero?}','TipoNoticiaController@prueba');

Route::apiResource('/tipoNoticia','TipoNoticiaController');