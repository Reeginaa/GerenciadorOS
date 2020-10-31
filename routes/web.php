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
    return view('home');
});


Route::resource('login', 'App\Http\Controllers\Auth\LoginController');
Route::resource('home', 'App\Http\Controllers\HomeController');
Route::resource('sobre', 'App\Http\Controllers\SobreController');



    Route::resource('marcas', 'App\Http\Controllers\MarcaController');
    Route::resource('tipoPessoas', 'App\Http\Controllers\TipoPessoaController');
    Route::resource('statusServicos', 'App\Http\Controllers\StatusServicoController');
    Route::resource('servicos', 'App\Http\Controllers\ServicoController');
    Route::resource('pecas', 'App\Http\Controllers\PecaController');
    Route::resource('equipamentos', 'App\Http\Controllers\EquipamentoController');
    Route::resource('pessoas', 'App\Http\Controllers\PessoaController');
    Route::resource('ordemServicos', 'App\Http\Controllers\OrdemServicoController');
    Route::resource('osPecas', 'App\Http\Controllers\OSPecaController');
    Route::resource('osServicos', 'App\Http\Controllers\OSServicoController');
    Route::resource('admin', 'App\Http\Controllers\AdminController');;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
