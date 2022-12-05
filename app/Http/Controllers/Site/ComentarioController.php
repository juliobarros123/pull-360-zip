<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    //
    public function index()
    {
      $response['comentarios']=Comentario::join('users','users.id','comentarios.it_idUser')
      ->where('comentarios.estado',1)->get();
       
        return view('site.comentario.index', $response);
    }
    public function enviar()
    {
        return view('site.feedback.enviar.index');
    }
    public function cadastrar(Request $request)
    {

        Comentario::create(
            [

                'it_idUser'=>Auth::user()->id,
                'comentario' => $request->comentario,
                'slug' => slug_gerar()
            ]
        );
        return redirect()->back()->with('comentario_salvo', '1');
    }
}
