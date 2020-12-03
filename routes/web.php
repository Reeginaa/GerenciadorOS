<?php

use Illuminate\Support\Facades\Auth;
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

Route::resource('sobre', 'App\Http\Controllers\SobreController');
Route::resource('home', 'App\Http\Controllers\HomeController');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tipoPessoas', 'App\Http\Controllers\TipoPessoaController');
    Route::get('tipopessoas/{id}/destroy', 'App\Http\Controllers\TipoPessoaController@destroy');
    Route::resource('marcas', 'App\Http\Controllers\MarcaController');
    Route::get('marcas/{id}/destroy', 'App\Http\Controllers\MarcaController@destroy');
    Route::resource('equipamentos', 'App\Http\Controllers\EquipamentoController');
    Route::get('equipamentos/{id}/destroy', 'App\Http\Controllers\EquipamentoController@destroy');
    Route::resource('pecas', 'App\Http\Controllers\PecaController');
    Route::get('pecas/{id}/destroy', 'App\Http\Controllers\PecaController@destroy');
    Route::resource('servicos', 'App\Http\Controllers\ServicoController');
    Route::get('servicos/{id}/destroy', 'App\Http\Controllers\ServicoController@destroy');
    Route::resource('statusServicos', 'App\Http\Controllers\StatusServicoController');
    Route::get('statusservicos/{id}/destroy', 'App\Http\Controllers\StatusServicoController@destroy');
    Route::resource('pessoas', 'App\Http\Controllers\PessoaController');
    Route::get('pessoas/{id}/destroy', 'App\Http\Controllers\PessoaController@destroy');
    Route::resource('ordemServicos', 'App\Http\Controllers\OrdemServicoController');
    Route::resource('osPecas', 'App\Http\Controllers\OSPecaController');
    Route::post('ospecas/destroy', 'App\Http\Controllers\OSPecaController@destroy')->name('removerPecas');
    Route::resource('osServicos', 'App\Http\Controllers\OSServicoController');
    Route::get('osservicos/{id}/destroy', 'App\Http\Controllers\OSServicoController@destroy');
    Route::resource('anexoorcamento', 'App\Http\Controllers\AnexoOrcamentoController');
    Route::get('anexoorcamento/{id}/destroy', 'App\Http\Controllers\AnexoOrcamentoController@destroy');
    Route::get('download/{id}', 'App\Http\Controllers\AnexoOrcamentoController@download')->name('download');
    Route::get('fecharOS/{id}', 'App\Http\Controllers\OrdemServicoController@fechar')->name('fecharOS');
    Route::get('reabrirOS/{id}', 'App\Http\Controllers\OrdemServicoController@reabrir')->name('reabrirOS');
    Route::get('faturarOS/{id}', 'App\Http\Controllers\OrdemServicoController@faturar')->name('faturarOS');
    Route::get('concertarOS/{id}', 'App\Https\Controllers\OrdemServicoController@concertado')->name('concertarOS');
    Route::post('postPeca', 'App\Http\Controllers\PecaController@postPeca')->name('postPeca');
    Route::post('postServico', 'App\Http\Controllers\ServicoController@postServico')->name('postServico');
});

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
