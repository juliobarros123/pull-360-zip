<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class CompraController extends Controller
{
    //
    public function comprar(Request $request){
        if ($request->session()->has("produtos")) {
            $produtos = $request->session()->get("produtos");
        } else {
            $produtos = [];
        }
        $produtos = collect($produtos);

        // dd($produtos);
        $response['produtos'] = $produtos;
        return view('site.compra.index', $response);
       
    }
    public function efectuada( Request $request){
        if ($request->session()->has("produtos")) {
            $produtos = $request->session()->get("produtos");
        } else {
            $produtos = [];
        }
        $produtos = collect($produtos);
        $response['produtos'] = $produtos;
        return view('site.compra.efectuada.index',$response);
    }
    public function efectuar_compra(Request $request){
        try{
            if(true){
                // dd($request);
                return redirect()->route('compras.efectuada')->with('feedback', ['status'=>'1','sms'=>'Compra efectuada com sucesso']);
            }else{
    
            }
        }catch(Exception $ex){
            return redirect()->back()->with('feedback', ['error'=>'1','sms'=>'Erro ao efectuar comprar']);
        }

    }
}
