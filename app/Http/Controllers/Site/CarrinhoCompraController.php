<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FotoGaleria;

class CarrinhoCompraController extends Controller
{
    //
    public function estado(Request $request)
    {
        if ($request->session()->has("produtos")) {
            $produtos = $request->session()->get("produtos");
        } else {
            $produtos = [];
        }
        $produtos = collect($produtos);

        // dd($produtos);
        $response['produtos'] = $produtos;
        return view('site.carrinho.estado.index', $response);
    }
    public function add(Request $request, $slug_foto)
    {
        $produto = FotoGaleria::where('slug', $slug_foto)->first();
        $nome_sessao = "produtos";
        //   $request->session()->forget("produtos");
        //   $request->session()->save();
        // dd($request->session()->get("$nome_sessao"));

        $produtos =   $this->addUpdateProduct($request, "produtos", $produto->id, $produto->titulo, $produto->preco, 1, $produto->foto, $produto->slug, $produto->largura, $produto->altura);
        // dd(  $produtos,"ola");
        return redirect()->back()->with('feedback', ['status' => '1', 'sms' => 'Produto adicionado com sucesso']);
        return view('site.feedback.index');
    }
    public function addUpdateProduct(Request $request, $nome_sessao, $idProduto, $nome, $preco = 0, $qt, $path_img = "", $slug = "",$largura,$altura)
    {
        $collection = collect();
        if ($request->session()->has("$nome_sessao")) {
            $produtos = $request->session()->get("$nome_sessao");
            $collection = collect($produtos);
            if (!$collection->where("id", $idProduto)->count()) {
                $collection->push(array(
                    'id' =>  $idProduto, // inique row ID
                    'name' => $nome,
                    'price' => $preco,
                    'quantity' => $qt,
                    'path_img' =>   $path_img,
                    'slug' =>   $slug,
                    'largura'=>$largura,
                    'altura'=>$altura
                ));
                $collection->all();

                $request->session()->forget("$nome_sessao");

                $request->session()->put("$nome_sessao",  $collection->toArray());
                $request->session()->save();
            }
            // dd($request->session()->get("$nome_sessao"));
            // dd($request->session()->get("$nome_sessao"), 'ola');
            // $request->session()->put("$nome_sessao",  $collection->toArray());

        } else {
            $collection->push(array(
                'id' =>  $idProduto, // inique row ID
                'name' => $nome,
                'price' => $preco,
                'quantity' => 1,

                'path_img' =>   $path_img,
                'slug' =>   $slug
            ));
            $request->session()->put("$nome_sessao",  $collection->toArray());
            $request->session()->save();
            // dd($request->session()->get("$nome_sessao"));
        }
        return $request->session()->get("$nome_sessao");
    }
    public function eliminar($id)
    {
        $p = $this->deleteProductCart('produtos', $id);
        return redirect()->back()->with('feedback', ['status' => '1', 'sms' => 'Produto elimanado com sucesso']);
    }
    public function deleteProductCart($nome_sessao, $id_produto)
    {
        $produtos = collect(session()->get("$nome_sessao"));
        $produto = $produtos->where('id', $id_produto)->first();
        $result = $this->eliminarElement($produto, $produtos);
        session()->forget("produtos");
        session()->save();
        session()->put("produtos",   $result);
        session()->save();
        return  session()->get("$nome_sessao");
    }
    public   function eliminarElement($element, $collection)
    {

        $keys = $collection->keys();
        $keys->all();
        foreach ($keys as $key) {
            if ($collection[$key] == $element) {
                $collection =  $collection->except([$key]);
                return  $collection;
            }
        }
    }
}
