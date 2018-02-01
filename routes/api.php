<?php

use Illuminate\Http\Request;

//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/user', function (Request $request) {
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

//    Route::get('revisions/tipos/{id?}', 'TipoAPIController@revisions');
//    Route::get('revisions/distritos/{id?}', 'DistritoAPIController@revisions');
//    Route::get('revisions/bairros/{id?}', 'BairroAPIController@revisions');
//    Route::get('revisions/categorias/{id?}', 'CategoriaAPIController@revisions');
//    Route::get('revisions/subprefeituras/{id?}', 'SubprefeituraAPIController@revisions');
//    Route::get('revisions/subprefeiturasantigas/{id?}', 'SubprefeituraAntigaAPIController@revisions');
//    Route::get('revisions/logradouros/{id?}', 'LogradouroAPIController@revisions');
//    Route::get('revisions/cometarios/{id?}', 'ComentarioAPIController@revisions');
//    Route::get('revisions/users/{id?}', 'ComentarioAPIController@revisions');

    Route::resource('users', 'UserAPIController');
    Route::post('logout', 'Auth\LogoutAPIController@logout');

});
