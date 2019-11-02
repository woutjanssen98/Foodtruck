<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Controller@index')->name('NL');
Route::prefix('NL')->group(function(){
    Route::get('/', 'Controller@index')->name('NL');
});

Route::prefix('Eng')->group(function(){
    Route::get('/', 'Controller@index')->name('ENG');
});

Route::prefix('login')->group(function (){
   Route::get('/','Auth\LoginController@index');
   Route::post('/login','Auth\LoginController@login')->name('log-in');

});

Route::prefix('registreer')->group(function (){
    Route::post('/opslaan','Auth\RegisterController@opslaan')->name('opslaan');
});

Route::prefix('gerecht')->group(function (){
    Route::post('/toevoegen','GerechtenController@toevoegen')->name('toevoegen');
    Route::post('/verwijderen', 'GerechtenController@verwijderen')->name('verwijderen');
    Route::post('/wijzigen', 'GerechtenController@wijzigen')->name('wijzigen');
    Route::post('/wijzigen/modal','GerechtenController@wijzigenModal');
});



