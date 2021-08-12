<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/prueba','Api\UserController@poto');

Route::post('/register', 'Api\UserController@register');
Route::post('/login', 'Api\UserController@login');
Route::get('/logout', 'Api\UserController@logout');
Route::apiResource('nota', 'Api\NotaController')->middleware('auth:api');
Route::apiResource('periodo', 'Api\PeriodoController');
Route::apiResource('marca', 'MarcaController')->middleware('auth:api');