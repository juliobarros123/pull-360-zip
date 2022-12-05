<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FotoComentario;
use Illuminate\Support\Facades\Auth;

class FotoComentarioController extends Controller
{
    //i
    public function cadastrar(Request $request, $id_foto)
    {
        FotoComentario::create([
            'id_user' => Auth::User()->id,
            'comentario' => $request->comentario,
            'id_foto_galeria' => $id_foto,
            'slug' => slug_gerar()
        ]);

        return redirect()->back()->with('feedback', ['status' => '1', 'sms' => 'Comentário postado com sucesso']);
    }
    public function eliminar($id)
    {
        try{
         FotoComentario::find($id)->delete();
        return response()->json("Pla");
        }catch(\Exception $ex){
            return response()->json($ex->getMessage());
        }
    }
    public function editar(Request $request,$id_comentario){
        FotoComentario::find($id_comentario)->update([
            'comentario' => $request->comentario,
        ]);
        return response()->json($request->comentario);
    }
}
