<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\FotoGaleria;
use Illuminate\Support\Facades\Auth;
use App\Models\CapaTimeline;
class TestController extends Controller
{

    protected $capa_timeline;
    protected $foto_galeria;
    public function __construct(CapaTimeline $capa_timeline, FotoGaleria $foto_galeria)
    {
        $this->capa_timeline = $capa_timeline;
        $this->foto_galeria = $foto_galeria;
    }
    //
    public function index()
    {
        // $response = Http::withHeaders([
        //     'Authorization' => 'Basic eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9',
        //     'Content-Type' => 'application/json'
        // ])->get("http://192.168.10.53:8000/api/v1/aluno/por/processo/12921");
        // dd(json_decode($response->body()));
        // $response['capas']=$this->capa_timeline->capas_timeline();
        // // dd($response['capas']);
       
        return view('site.demo.index');
    }
    public function carrinho_compra_1()
    {
        return view('site.demo.carrinho-compra-1');
    }
    public function fotografia()
    {
        return view('site.demo.fotografia');
    }
    public function detalhe_produto()
    {
        // return view('site.demo.detalhe-produto');
        $slug=Auth::User()->slug;
    //    dd(    $slug);
            $fotos_galeria = $this->foto_galeria->fotos()->get();
            $response['fotos_galeria']= $fotos_galeria;
        // dd( $fotos_galeria);
        return view('site.demo.detalhe-produto',$response);
    }
}
