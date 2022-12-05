<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\controllerTurma;
use App\Models\Escola;
use Illuminate\Http\Request;
use App\Models\FuncionarioEscola;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/home', ['as' => 'home', 'uses' => 'Site\HomeController@index']);
Route::get('/', ['as' => '', 'uses' => 'Site\HomeController@index']);
/*
|------------------- Timeline start--------------
*/

Route::group(['prefix' => 'pesquisas/'], function () {
    Route::get('artes/ajax/{texto}', ['as' => 'pesquisas.artes.ajax', 'uses' => 'Ajax\PesquisaController@pesquisar']);
    Route::get('artes/{texto}', ['as' => 'pesquisas.artes.pesquisar', 'uses' => 'Site\PesquisaController@pesquisar']);
});


Route::group(['prefix' => 'compras'], function () {
    Route::get('comprar', ['as' => 'compras.comprar', 'uses' => 'Site\CompraController@comprar']);
   
    Route::post('efectuar-compra', ['as' => 'compras.efectuar-compra', 'uses' => 'Site\CompraController@efectuar_compra']);
    Route::get('efectuada', ['as' => 'compras.efectuada', 'uses' => 'Site\CompraController@efectuada']);
   
    // Route::group(['add' => 'foto-galeria'], function () {
    //     Route::post('{id_foto}/cadastrar', ['as' => 'comentarios.foto-galeria.cadastrar', 'uses' => 'Site\FotoComentarioController@cadastrar']);
    //     // Route::get('{slug}/', ['as' => 'timeline.fotos-galeria', 'uses' => 'Site\FotoGaleriaController@index']);
    //     Route::get('{id_comentario}/eliminar', ['as' => 'comentarios.fotos-galeria.eliminar', 'uses' => 'Site\FotoComentarioController@eliminar']);
    //     Route::put('{id_com}/editar', ['as' => 'comentarios.foto-galeria.editar', 'uses' => 'Site\FotoComentarioController@editar']);
    // });
});
Route::group(['prefix' => 'carrinhos'], function () {
    Route::get('{slug_foto}/add', ['as' => 'carrinhos.add', 'uses' => 'Site\CarrinhoCompraController@add']);
    Route::get('estado', ['as' => 'carrinhos.estado', 'uses' => 'Site\CarrinhoCompraController@estado']);
    Route::get('{id}/eliminar', ['as' => 'carrinhos.eliminar', 'uses' => 'Site\CarrinhoCompraController@eliminar']);
    // Route::group(['add' => 'foto-galeria'], function () {
    //     Route::post('{id_foto}/cadastrar', ['as' => 'comentarios.foto-galeria.cadastrar', 'uses' => 'Site\FotoComentarioController@cadastrar']);
    //     // Route::get('{slug}/', ['as' => 'timeline.fotos-galeria', 'uses' => 'Site\FotoGaleriaController@index']);
    //     Route::get('{id_comentario}/eliminar', ['as' => 'comentarios.fotos-galeria.eliminar', 'uses' => 'Site\FotoComentarioController@eliminar']);
    //     Route::put('{id_com}/editar', ['as' => 'comentarios.foto-galeria.editar', 'uses' => 'Site\FotoComentarioController@editar']);
    // });
});
Route::middleware('auth:sanctum')->group(function () {

Route::group(['prefix' => 'painel'], function () {
    Route::get('/', ['as' => 'painel', 'uses' => 'Site\HomeController@painel']);
});

    Route::group(['prefix' => 'timeline/'], function () {
        Route::get('{slug}/', ['as' => 'timeline.index', 'uses' => 'Site\TimelineController@index']);
        Route::post('capa-editar', ['as' => 'timeline.capa-editar', 'uses' => 'Site\TimelineController@capa_editar']);
        Route::group(['prefix' => 'fotos-galeria/'], function () {
            Route::post('cadastrar', ['as' => 'timeline.fotos-galeria.cadastrar', 'uses' => 'Site\FotoGaleriaController@cadastrar']);
            Route::get('{slug}/', ['as' => 'timeline.fotos-galeria', 'uses' => 'Site\FotoGaleriaController@index']);
            Route::get('{slug}/definir-capa', ['as' => 'timeline.definir-capa', 'uses' => 'Site\FotoGaleriaController@difinir_capa']);
            Route::get('{id_foto}/comentarios', ['as' => 'timeline.fotos-galeria.comentarios', 'uses' => 'Site\FotoGaleriaController@comentarios']);
            Route::get('{id_foto}/pesquisar', ['as' => 'timeline.fotos-galeria.pesquisar', 'uses' => 'Site\FotoGaleriaController@pesquisar']);
            Route::put('{id_foto}/actualizar', ['as' => 'timeline.fotos-galeria.actualizar', 'uses' => 'Site\FotoGaleriaController@actualizar']);

            Route::get('{slug_foto}/eliminar', ['as' => 'timeline.fotos-galeria.eliminar', 'uses' => 'Site\FotoGaleriaController@eliminar']);
            Route::get('{slug}/detalhe-produto', ['as' => 'timeline.fotos-galeria.detalhe_produto', 'uses' => 'Site\FotoGaleriaController@detalhe_produto']);
        });
        Route::group(['prefix' => 'meu-sobre'], function () {
            Route::post('cadastrar', ['as' => 'timeline.meu-sobre.cadastrar', 'uses' => 'Site\MeuSobreContoller@cadastrar']);
            // Route::get('{slug}/', ['as' => 'timeline.fotos-galeria', 'uses' => 'Site\FotoGaleriaController@index']);
            Route::put('/update', ['as' => 'timeline.meu-sobre.update', 'uses' => 'Site\MeuSobreContoller@update']);
        });
        Route::get('sobre/{slug}', ['as' => 'timeline.sobre', 'uses' => 'Site\MeuSobreContoller@index']);
    });
});

/*
|------------------- Timeline end--------------
*/


Route::group(['prefix' => 'comentarios'], function () {
    Route::group(['prefix' => 'foto-galeria'], function () {
        Route::post('{id_foto}/cadastrar', ['as' => 'comentarios.foto-galeria.cadastrar', 'uses' => 'Site\FotoComentarioController@cadastrar']);
        // Route::get('{slug}/', ['as' => 'timeline.fotos-galeria', 'uses' => 'Site\FotoGaleriaController@index']);
        Route::get('{id_comentario}/eliminar', ['as' => 'comentarios.fotos-galeria.eliminar', 'uses' => 'Site\FotoComentarioController@eliminar']);
        Route::put('{id_com}/editar', ['as' => 'comentarios.foto-galeria.editar', 'uses' => 'Site\FotoComentarioController@editar']);
    });
});

Route::group(['prefix' => 'testes'], function () {
    Route::get('/', ['as' => 'pull', 'uses' => 'Site\TestController@index']);
    Route::get('/fotografia', ['as' => 'pull.fotografia', 'uses' => 'Site\TestController@fotografia']);
    Route::get('/detalhe_produto', ['as' => 'pull.detalhe_produto', 'uses' => 'Site\TestController@detalhe_produto']);
    Route::get('/carrinho_compra_1', ['as' => 'pull.carrinho_compra_1', 'uses' => 'Site\TestController@carrinho_compra_1']);
});

Route::get('/', ['as' => 'pull', 'uses' => 'Site\HomeController@index']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//site inicial inicio

//site inicial fim

//User-Start
// Route::get('utilizador/cadastrar  ', ['as' => 'site.users.cadastrar', 'uses' => 'Site\UserController@create']);
Route::post('site/users/salvar', ['as' => 'users.salvar', 'uses' => 'Site\UserController@salvar']);
Route::get('encarregado', function () {
    return view('site.encarregado.index');
});

Route::get('inscrever-se', ['as' => 'inscrever-se', 'uses' => function () {
    return view('auth.register');
}]);


Route::get('/termos-de-uso-condicoes', ['as' => 'site.termos', 'uses' => 'Site\TermoController@index']);

Route::group(['prefix' => 'desafios/quizzes/'], function () {
    Route::get('escolha/disciplinas', ['as' => 'desafios.quizzes.disciplinas', 'uses' => 'Site\QuizController@disciplinas']);
    Route::post('{id_video}/nao_gostei', ['as' => 'reacoes_video.nao_gostei', 'uses' => 'Admin\ReacaoVideoController@nao_gostei']);
    Route::get('escolha/{id}/niveis', ['as' => 'desafios.quizzes.niveis', 'uses' => 'Site\QuizController@nivel']);
    Route::get('escolha/{slug}/{id_c_d}/nivel_guardar', ['as' => 'desafios.quizzes.niveis.nivel_guardar', 'uses' => 'Site\QuizController@nivel_guardar']);
    Route::get('questao', ['as' => 'desafios.quizzes.questao', 'uses' => 'Site\QuizController@questao']);
    Route::get('{id_questao}/{slug_resposta}/avaliacao', ['as' => 'desafios.quizzes.questao.avaliacao', 'uses' => 'Site\QuizController@avaliacao']);
    Route::get('classificao/avaliacao', ['as' => 'desafios.quizzes.classificao', 'uses' => 'Site\QuizController@classificao']);
});

Route::group(['prefix' => 'palavra_passe'], function () {
    route::get('recuperar', ['as' => 'palavra_passe.recuperar', 'uses' => 'PalavrarPasseController@recuperar']);
    route::post('redefinir', ['as' => 'palavra_passe.redefinir', 'uses' => 'PalavrarPasseController@redefinir']);
    route::post('codigo', ['as' => 'palavra_passe.codigo', 'uses' => 'PalavrarPasseController@codigo']);
    route::post('vrf_codigo_confirme', ['as' => 'palavra_passe.vrf_codigo_confirme', 'uses' => 'PalavrarPasseController@vrf_codigo_confirme']);
    // route::post('nova_pa',['as' => 'email.vrf_codigo_confirme', 'uses' => 'PalavrarPasseController@vrf_codigo_confirme']);
    route::get('nova_palavra_passe/', ['as' => 'palavra_passe.nova_palavra_passe', 'uses' => 'PalavrarPasseController@nova_palavra_passe']);
    route::post('registar_palavra_passe/', ['as' => 'palavra_passe.registar_palavra_passe', 'uses' => 'PalavrarPasseController@registar_palavra_passe']);

    route::get('confirmar_codigo', ['as' => 'palavra_passe.confirmar_codigo', 'uses' => 'PalavrarPasseController@confirmar_codigo']);
});
Route::group(['prefix' => 'feedbacks'], function () {
    route::get('', ['as' => 'feedbacks', 'uses' => 'Site\FeedBackController@index']);
    route::get('enviar', ['as' => 'feedbacks.enviar', 'uses' => 'Site\FeedBackController@enviar']);
    route::post('cadastrar', ['as' => 'feedbacks.cadastrar', 'uses' => 'Site\FeedBackController@cadastrar']);
});

Route::group(['prefix' => 'comentarios'], function () {
    route::get('', ['as' => 'comentarios', 'uses' => 'Site\ComentarioController@index']);
    route::get('enviar', ['as' => 'comentarios.enviar', 'uses' => 'Site\ComentarioController@enviar']);
    route::post('cadastrar', ['as' => 'comentarios.cadastrar', 'uses' => 'Site\ComentarioController@cadastrar']);
});
