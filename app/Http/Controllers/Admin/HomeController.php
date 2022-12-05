<?php
/* Este sistema esta protegido pelos direitos autoriais do Instituto de Telecomunicações criado ao
abrigo do decreto executivo conjunto nº29/85 de 29 de Abril,
dos Ministérios da Educação e dos Transportes e Comunicações,
publicado no Diário da República, 1ª série nº 35/85, nos termos
do artigo 62º da Lei Constitucional.

contactos:
site:www.itel.gov.ao
Telefone I: +244 931 313 333
Telefone II: +244 997 788 768
Telefone III: +244 222 381 640
Email I: secretariaitel@hotmail.com
Email II: geral@itel.gov.ao*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MenuController;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  
    public function __construct()
    {
       
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function ObjectAlunosPorProvincias()
    {
     
        //  $dados= Empresa::where('vc_estadoaprovacao', 1)->get();
     
        $provinciasObject = (object) ["Benguela"
            , "Bié"
            , "Cabinda"
            , "Cunene"
            , "Huambo"
            , "Huíla"
            , "Kuando Kubango"
            , "Kwanza Norte"
            , "Kwanza Sul"
            , "Luanda"
            , "Lunda Norte"
            , "Lunda Sul"
            , "Malange"
            , "Moxico"
            , "Namibe"
            , "Uíge"
            , "Zaire",
        ];
        $alunos = array();
        $provincias = array();

        foreach ($provinciasObject as $provincia) {
            $qtalunos = DB::table('matriculas')
                ->where([['matriculas.it_estado', 1], ['escolas.it_estado', 1]])
                ->join('escolas', 'matriculas.it_id_escola', 'escolas.id')
                ->where('escolas.it_id_provincia', $provincia)->count();
            array_push($alunos, $qtalunos);
            array_push($provincias, $provincia);
        }

          $dados = [
            'alunos'=> $alunos,
            'provincias'=> $provincias,
        ];

           return $dados;

        //grafico para empresa logada
        // foreach($dados as $empresa ) {
        //     $candidato = DB::table('candidatos')
        //     ->join('empresas', 'candidatos.id_empresa', '=', 'empresas.id')
        //         ->where('empresas.id',$empresa->id )->count();

        //     array_push($candidatos, $candidato);
        //     array_push($empresas, $empresa->vc_nome_curto);
        // }

        // $dados = (object) [
        //     'empresas'=> json_encode($empresas),
        //     'candidatos'=> json_encode($candidatos),
        // ];

        //    return $dados;

    }
}
