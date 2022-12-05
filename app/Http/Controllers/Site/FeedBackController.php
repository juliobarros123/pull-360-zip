<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedBack;

class FeedBackController extends Controller
{
    //
    public function index()
    {
        return view('site.feedback.index');
    }
    public function enviar()
    {
        return view('site.feedback.enviar.index');
    }
    public function cadastrar(Request $request)
    {
// dd( $request);
        FeedBack::create(
            [
                'nome' => $request->nome,
                'email' => $request->email,
                'assunto' => $request->assunto,
                'mensagem' => $request->mensagem,
                'slug' => slug_gerar()
            ]
        );
        return redirect()->back()->with('feedback_salvo', '1');
    }
}
