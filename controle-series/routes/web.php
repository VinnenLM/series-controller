<?php

use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
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

//Route::get('/', [SeriesControllerAlias::class, 'listarSeries'])->middleware(['auth']);
Route::get('/', function () {
    if(\Illuminate\Support\Facades\Auth::check()){
        return redirect('/series');
    }else{
        return redirect('/entrar');
    }
});

Route::get('/sair', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/entrar');
});

Route::get('/series', [SeriesControllerAlias::class, 'listarSeries'])->middleware(['auth']);
Route::get('/series/adicionar', [SeriesControllerAlias::class, 'criarSeries'])->middleware(['auth']);
Route::post('/series/adicionar', [SeriesControllerAlias::class, 'salvarSeries'])->middleware(['auth']);
Route::post('/series/{id}/editarSerie', [SeriesControllerAlias::class, 'editarSerie'])->middleware(['auth']);
Route::delete('/series/{id}', [SeriesControllerAlias::class, 'excluirSeries'])->middleware(['auth']);

Route::get('/series/{serie_id}/temporadas', [TemporadasController::class, 'listarTemporadas'])->middleware(['auth']);

Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class, 'listarEpisodios'])->middleware(['auth']);
Route::post('/temporadas/{temporada}/episodios/assistidos', [EpisodiosController::class, 'assistidos'])->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/entrar', [LoginController::class, 'entrar']);
Route::post('/entrar', [LoginController::class, 'logar']);

Route::get('/registrar', [RegistroController::class, 'registrar']);
Route::post('/registrar', [RegistroController::class, 'criarRegistro']);

require __DIR__ . '/auth.php';
