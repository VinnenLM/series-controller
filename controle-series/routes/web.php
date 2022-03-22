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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [\App\Http\Controllers\SeriesController::class, 'listarSeries']);
Route::get('/series', [\App\Http\Controllers\SeriesController::class, 'listarSeries']);
Route::get('/series/adicionar', [\App\Http\Controllers\SeriesController::class, 'criarSeries']);
Route::post('/series/adicionar', [\App\Http\Controllers\SeriesController::class, 'salvarSeries']);
Route::delete('/series/{id}', [\App\Http\Controllers\SeriesController::class, 'excluirSeries']);

Route::get('/series/{serie_id}/temporadas', [\App\Http\Controllers\TemporadasController::class, 'listarTemporadas']);

Route::get('/temporadas/{temporada_id}/episodios', [\App\Http\Controllers\EpisodiosController::class, 'listarEpisodios']);


Route::post('/series/{id}/editarSerie', [\App\Http\Controllers\SeriesController::class, 'editarSerie']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
