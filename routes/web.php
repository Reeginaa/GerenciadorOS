<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use JasperPHP\JasperPHP  as  JasperPHP ;

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
    Route::get('comprovantepdf/{id}', 'App\Http\Controllers\PdfController@comprovante')->name('comprovantepdf');
    Route::get('imprimirOS/{id}', 'App\Http\Controllers\PdfController@imprimirOS')->name('imprimirOS');
    Route::resource('osPecas', 'App\Http\Controllers\OSPecaController');
    Route::post('ospecas/destroy', 'App\Http\Controllers\OSPecaController@destroy')->name('removerOsPecas');
    Route::resource('osServicos', 'App\Http\Controllers\OSServicoController');
    Route::post('osservicos/destroy', 'App\Http\Controllers\OSServicoController@destroy')->name('removerOsServicos');
    Route::resource('anexoorcamento', 'App\Http\Controllers\AnexoOrcamentoController');
    Route::post('anexoorcamento/destroy', 'App\Http\Controllers\AnexoOrcamentoController@destroy')->name('removerAnexoOrcamento');
    Route::get('download/{id}', 'App\Http\Controllers\AnexoOrcamentoController@download')->name('download');
    Route::get('fecharOS/{id}', 'App\Http\Controllers\OrdemServicoController@fechar')->name('fecharOS');
    Route::get('reabrirOS/{id}', 'App\Http\Controllers\OrdemServicoController@reabrir')->name('reabrirOS');
    Route::get('concertarOS/{id}', 'App\Http\Controllers\OrdemServicoController@concertada')->name('concertarOS');
    Route::get('pagarOS/{id}', 'App\Http\Controllers\OrdemServicoController@pago')->name('pagarOS');
    Route::post('postPeca', 'App\Http\Controllers\PecaController@postPeca')->name('postPeca');
    Route::post('postServico', 'App\Http\Controllers\ServicoController@postServico')->name('postServico');
    Route::get('pdf', 'App\Http\Controllers\PdfController@geraPdf')->name('pdf');

    // Route::get('testando', 'App\Http\Controllers\JasperController@index')->name('testando');
    Route::get('testeReport', 'App\Http\Controllers\JasperController@generateReport')->name('testeReport');
});

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
