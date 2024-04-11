<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/ola', function () {
    return view ('public.index');  
});


Route::get('/series', 'App\Http\Controllers\SeriesController@index')
            ->name('listar_series');
Route::get('/series/adicionar', 'App\Http\Controllers\SeriesController@create')
            ->name('form_criar_serie');
Route::post('/series/adicionar', 'App\Http\Controllers\SeriesController@store');
Route::post('/series/remover/{id}', 'App\Http\Controllers\SeriesController@destroy');
Route::delete('/series/remover/{id}', 'App\Http\Controllers\SeriesController@destroy');
Route::get('/series/{serieId}/{temporadas}', 'App\Http\Controllers\TemporadasController@index');
Route::post('/series/{id}/editaNome', 'App\Http\Controllers\SeriesController@editaNome');

Route::get('/temporadas/{temporada}/episodios', 'App\Http\Controllers\EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'App\Http\Controllers\EpisodiosController@assistir');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/series', 'App\Http\Controllers\SeriesController@index');
