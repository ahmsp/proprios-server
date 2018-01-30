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


Route::resource('proprios', 'ProprioAPIController');

Route::resource('tipos', 'TipoAPIController');

Route::resource('secretarias', 'SecretariaAPIController');

Route::resource('distritos', 'DistritoAPIController');

Route::resource('legislacao_tipos', 'LegislacaoTipoAPIController');

Route::resource('secretarias', 'SecretariaAPIController');

Route::resource('subprefeituras', 'SubprefeituraAPIController');

Route::resource('tipos', 'TipoAPIController');

Route::resource('proprios', 'ProprioAPIController');