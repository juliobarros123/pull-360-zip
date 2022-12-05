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
 *///Tarefas_Submetidas/cadastrar

/*Route::get('/', ['as' => 'raiz', 'uses' => 'Admin\HomeController@raiz']);*/
//Route::get('/tt', ['as' => 't1', 'uses' => 'Admin\NotificacaoController@notificacarMateria']);

//
Route::get('demo', ['as' => 'demo', 'uses' => function () {
    return view('admin.demo.index');
}]);

// Route::group(['prefix' => 'painel'], function () {
//     Route::get('/', ['as' => 'painel', 'uses' => 'Site\HomeController@painel']);
//     Route::group(['prefix' => 'imagens'], function () {
//         Route::get('/', ['as' => 'pull', 'uses' => 'Site\TestController@index']);
//         Route::get('/fotografia', ['as' => 'pull.fotografia', 'uses' => 'Site\TestController@fotografia']);
//         Route::get('/detalhe_produto', ['as' => 'pull.detalhe_produto', 'uses' => 'Site\TestController@detalhe_produto']);
//         Route::get('/carrinho_compra_1', ['as' => 'pull.carrinho_compra_1', 'uses' => 'Site\TestController@carrinho_compra_1']);
        
//     });
// });



Route::middleware('auth:sanctum')->group(function () {
 
});
