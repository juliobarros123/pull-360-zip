<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeuSobre;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Repositories\Eloquent\UtilizadorRepository;
class MeuSobreContoller extends Controller
{
    //
    protected $user;
 
    protected $meu_sobre;
    public function __construct(MeuSobre $meu_sobre,UtilizadorRepository $user)
    {
        $this->user = $user;
        $this->meu_sobre = $meu_sobre;
    }
    public function update(Request $request){
        MeuSobre::create([
            'saudacao' => $request->saudacao,
            'descricao' => $request->descricao,
            'id_user' => Auth::User()->id,
            'slug' => slug_gerar()
        ]);
        $propreidades = upload_img($request, 'foto', 'foto-sobre');
        User::find(Auth::User()->id)->update([
            'profile_photo_path' =>  $propreidades["caminho"]
        ]);
        $dados=$request->all();
        $user = $this->user->update($dados,Auth::User()->id);
        return redirect()->back()->with('feedback', ['status' => '1', 'sms' => 'O teu sobre foi editado com sucesso']);

    }
    public function index($slug)
    {
        // dd($slug);
        // dd(Auth::user()->slug);
        $response['slug_user'] = $slug;
        $response['meu_sobre'] =   $this->meu_sobre->meu_sobre($slug)->first();
    //   dd($response['meu_sobre']);
        return view('site.timeline.sobre.index', $response);
    }
    public function cadastrar(Request $request)
    {
        MeuSobre::create([
            'saudacao' => $request->saudacao,
            'descricao' => $request->descricao,
            'id_user' => Auth::User()->id,
            'slug' => slug_gerar()
        ]);
        $propreidades = upload_img($request, 'foto', 'foto-sobre');
        User::find(Auth::User()->id)->update([
            'profile_photo_path' =>  $propreidades["caminho"]
        ]);
        return redirect()->back()->with('feedback', ['status' => '1', 'sms' => 'O teu sobre foi editado com sucesso']);
    }
}
