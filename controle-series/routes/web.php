<?php

use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\SeriesController as SeriesControllerAlias;
use App\Http\Controllers\TemporadasController;
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

Route::get('/', [SeriesControllerAlias::class, 'listarSeries']);
Route::get('/series', [SeriesControllerAlias::class, 'listarSeries']);
Route::get('/series/adicionar', [SeriesControllerAlias::class, 'criarSeries']);
Route::post('/series/adicionar', [SeriesControllerAlias::class, 'salvarSeries']);
Route::post('/series/{id}/editarSerie', [SeriesControllerAlias::class, 'editarSerie']);
Route::delete('/series/{id}', [SeriesControllerAlias::class, 'excluirSeries']);

Route::get('/series/{serie_id}/temporadas', [TemporadasController::class, 'listarTemporadas']);

Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class, 'listarEpisodios']);
Route::post('/temporadas/{temporada}/episodios/assistidos', [EpisodiosController::class, 'assistidos']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
