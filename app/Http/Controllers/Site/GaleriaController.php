<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FotoGaleria;
use Illuminate\Support\Facades\Auth;

class GaleriaController extends Controller
{
    protected $capa_timeline;
    protected $foto_galeria;
    public function __construct(FotoGaleria $foto_galeria)
    {
        
        $this->foto_galeria=$foto_galeria;
    }
    public function index($slug){
        $response['fotos_galeria']= $this->foto_galeria->minhas_fotos_timeline($slug);
   
        return view('timeline.index',$response);
    }
public function cadastrar(Request $request){
   
    $propreidades = upload_img($request, 'foto', 'galeria');

    Galeria::create([
        'descricao'=>$request->descricao,
        'preco'=>$request->preco,
        'id_user' => Auth::User()->id,
        'capa' => $propreidades["caminho"],
        'altura' => $propreidades["altura"],
        'largura' => $propreidades["largura"],
        'bits' => $propreidades["bits"],
        'mime' => $propreidades["mime"],
        'slug' => slug_gerar()
    ]);
    return redirect()->back()->with('feedback', ['status'=>'1','sms'=>'Imagem adicionada com sucesso']);
    }
    
 
}
