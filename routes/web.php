<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PlacarPublicoController;


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Rotas de Login e Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirecionar '/' para login (ou para dashboard se autenticado)
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/placar/{partida}', [PlacarPublicoController::class, 'exibir'])->name('placar.publico');
Route::get('/placar/{id}', [PlacarPublicoController::class, 'exibir'])->name('placar.publico');
Route::get('/placar/{id}/dados', [PlacarPublicoController::class, 'dados']);
Route::get('/placar-publico/{id}', [PlacarPublicoController::class, 'exibir'])->name('placar.publico');
Route::get('/placar-publico/dados/{id}', [PlacarPublicoController::class, 'dados']);
Route::get('/placar-publico', [PlacarPublicoController::class, 'index']);
Route::get('/placar-publico/{id}/dados', [PlacarPublicoController::class, 'dados']);




// Rotas protegidas (com middleware auth)
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('modalidades', \App\Http\Controllers\ModalidadeController::class);
    Route::resource('competicoes', \App\Http\Controllers\CompeticaoController::class);
    Route::resource('equipes', \App\Http\Controllers\EquipeController::class);
    Route::resource('jogadores', \App\Http\Controllers\JogadorController::class);
    Route::resource('partidas', \App\Http\Controllers\PartidaController::class);
    Route::resource('participantes', \App\Http\Controllers\ParticipantePartidaController::class);
    Route::resource('sets', \App\Http\Controllers\SetController::class);
    Route::resource('chaves', \App\Http\Controllers\ChaveController::class);
    Route::resource('placar-ao-vivo', \App\Http\Controllers\PlacarAoVivoController::class);
    Route::resource('eventos', \App\Http\Controllers\EventoController::class);
    Route::resource('quadras', \App\Http\Controllers\QuadraController::class);
    Route::get('placar-ao-vivo/atualizar', [App\Http\Controllers\PlacarAoVivoController::class, 'atualizar'])->name('placar-ao-vivo.atualizar');

});
