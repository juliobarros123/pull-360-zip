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

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Admin\MatriculaController;
use App\Http\Controllers\Controller;
use App\Imports\DependenciaProfessorImport;
use App\Models\Classe;
use App\Models\Logger;
use App\Models\Matricula;
use App\Models\User;
use App\Repositories\Eloquent\UtilizadorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    use PasswordValidationRules;

    protected $user;
    private $Logger;
    protected $matricula;
    public function __construct(UtilizadorRepository $user, MatriculaController $matriculaController, Matricula $matricula)
    {

        $this->user = $user;

        $this->Logger = new Logger();
        $this->matriculaController = $matriculaController;
        $this->matricula = $matricula;
    }
    public function importarExecutar(Request $request)
    {
        try {
            Excel::import(new DependenciaProfessorImport, $request->file('arquivo')->store('temp'));
            return redirect()->back()->with('status', 1);
        } catch (\Exception $exception) {

            return redirect()->back()->with('aviso', '1');
        }
    }

    public function excelImportar()
    {

        return view('admin.users.excel.importar.index');

    }
    public function index()
    {

        $users = $this->users();
        if (request()->ajax()) {
            return datatables()->of($users)
                ->addColumn('dropdownAction', 'admin.users.action')
                ->addColumn('tipoUtilizador', 'admin.users.tipo-utilizador')
                ->rawColumns(['dropdownAction','tipoUtilizador'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.users.index', compact('users'));
    }

    public function users()
    {
        $users = User::get();
        if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Supervisor' ) {
            return $users->where('vc_tipoUtilizador', '!=', 'Desenvolvedor')->where('vc_tipoUtilizador', '!=', 'Filho');
            //   return User::where('vc_tipoUtilizador', 'Professor')::get();
        } else if (Auth::User()->vc_tipoUtilizador == 'Desenvolvedor') {
            return $users;

        } else if (Auth::User()->vc_tipoUtilizador == 'Diretor Municipal') {
            return $users->where('vc_tipoUtilizador', 'Professor');

        }
        // dd($users);

    }

    public function verPerfil($id)
    {
        $id_user = $id;

        try {
            $user = User::where('id', $id_user)->get();
            return response()->json($user[0]['id']);
        } catch (\Exception $exception) {

            return redirect()->back()->with('aviso', '1');
        }
    }

    public function mudarPerfil($id, $perfil)
    {
        $id_user = $id;
        $perfil_user = $perfil;

        try {

            $usuario = Auth::User()->vc_primemiroNome . ' ' . Auth::User()->vc_apelido;
            $result = User::find($id);
            $usuario_mudado = $result->vc_primemiroNome . ' ' . $result->vc_apelido;
            $user = User::find($id_user)->update(['vc_tipoUtilizador' => $perfil_user]);
            $this->Logger->Log('info', $usuario . ' modou o perfil do  ' . $usuario_mudado . ' para ' . $perfil);
            return response()->json($user);
        } catch (\Exception $exception) {

            return redirect()->back()->with('aviso', '1');
        }
    }

    public function create()
    {
        $isAdd = true;
        return view('admin.users.cadastrar.index', compact('isAdd'));
    }

    public function salvar(Request $request)
    {

        try {

            $dados = $request->all();

//            $dados['vc_nomeUtilizador'] = $dados['vc_primemiroNome'] . ' ' . $dados['vc_apelido'];
            $upload = $this->upload_img($request);
            $dados['profile_photo_path'] = $upload;

            Validator::make($dados, [
                // 'vc_nomeUtilizador' => ['required', 'string', 'max:255'],
                'vc_email' => ['required', 'string', 'email', 'unique:users'],
                'password' => $this->passwordRules(),
            ])->validate();
            // dd(  $dados['profile_photo_path']);
            $this->user->store($dados);

            $this->Logger->Log('info', 'Adicionou ao sistema um novo utilizador com o nome de ' . $dados['vc_nomeUtilizador']);
            return redirect()->back()->with('status', 1);
        } catch (\Exception $exception) {

            return redirect()->back()->with('error', 1);
        }
    }

    public function editarPasse($id)
    {

        // if (!$this->validar_autoria($id)) {

        //     return redirect()->back()->with('acao_nao_autorizado', 1);
        // }

        $user = User::find($id);
        // if ($response['user'] = User::find($id)):

                $isEdit = true;
            return view('admin.users.editar.edita-passe', compact('user', 'isEdit'));
        // else:
        //     return redirect('admin/users/cadastrar')->with('teste', 1);

        // endif;
    }

    public function atualizarPasse(Request $input, $id)
    {

        // if (!$this->validar_autoria($id)) {
        //     return redirect()->back()->with('acao_nao_autorizado', 1);
        // }

        try {
            $user = User::find($id);
            if (Hash::check($input->password, $user->password)) {
                if ($input->nova_passe == $input->password_confirmation) {

                    $dados = $input->all();
                    $this->user->update_senha($dados, $id);
                    $this->Logger->Log('info', 'Actualizou o utilizador de id ' . $id);
                    return redirect('admin/users/listar')->with('editado', 1);
                } else {
                    return redirect()->back()->with('passe_nao_bate', 1);
                }
            } else {
                return redirect()->back()->with('passe_nao_existe', 1);
            }
        } catch (\Exception $exception) {

//            dd($exception);

            return redirect()->back()->with('error', 1);
        }
    }
    public function editar($id)
    {

        if (!$this->validar_autoria($id)) {

            return redirect()->back()->with('acao_nao_autorizado', 1);
        }

        $user = User::find($id);
        if ($response['user'] = User::find($id)):

            /*if ( $user->vc_tipoUtilizador == 'Filho' ):
            return view( 'admin.users.editar.index', compact( 'user' ) );
            else:
            return view( 'admin.users.editar.index', compact( 'user' ) );
            endif;
             */
            $isEdit = true;
            return view('admin.users.editar.index', compact('user', 'isEdit'));
        else:
            return redirect('admin/users/cadastrar')->with('teste', 1);

        endif;
    }

    public function atualizar(Request $input, $id)
    {

        if (!$this->validar_autoria($id)) {
            return redirect()->back()->with('acao_nao_autorizado', 1);
        }

        try {
            $dados = $input->all();
            $user = User::find($id);
            $dados['profile_photo_path'] = $this->upload_img($input);
            //    if($dados['profile_photo_path']!=)
            //            dd($dados['profile_photo_path']);
            //                $dados['profile_photo_path'] = $user->profile_photo_path;
            $this->user->update($dados, $id);

            $this->Logger->Log('info', 'Actualizou o utilizador de id ' . $id);
            return redirect()->back()->with('editado', 1);

        } catch (\Exception $exception) {

//            dd($exception);

            return redirect()->back()->with('error', 1);
        }
    }
    public function validar_autoria($id)
    {

        if ($id == Auth::user()->id) {
            return true;
        } else if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Supervisor'  || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor') {
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id)
    {
        User::find($id)->delete();
        $this->Logger->Log('info', 'Eliminou do sistema o utilizador de id ' . $id);
        //return redirect()->back();
        return redirect()->back()->with('eliminado', 1);
    }

    public function escrever()
    {
        return view('admin.filhos1.cadastrar.index');
    }

    public function filhos($id)
    {

        $users = User::where('current_team_id', $id)->get();
        return view('site.filho.ver.index', compact('users'));
    }
    public function meus_filhos()
    {

        $users = User::where('current_team_id', Auth::id())->get();
        return view('site.filho.ver.index', compact('users'));
    }

    public function educandos()
    {
       

        if (request()->ajax()) {
            $reponse['users']="";
            if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Supervisor'  || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor') {
              $e= $reponse['users'] = $this->educando_matricula()->get();
            } else {
                $e=  $reponse['users'] = $this->educando_matricula()->where('users.current_team_id', Auth::User()->id)->get();
            }
            // $users = $educandos = User::where('vc_tipoUtilizador', 'Filho')->orWhere('vc_tipoUtilizador', 'Aluno')->get();
            // dd(  $users);
            $reponse['classes'] = Classe::where('it_estado', '=', 1)->get();
            return datatables()->of($e)
                ->addColumn('dropdownAction', 'admin.filhos1.action')
                ->rawColumns(['dropdownAction'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.filhos1.index');
    }
    public function educando_matricula()
    {
        return User::join('matriculas', 'users.id', 'matriculas.it_id_utilizador')
            ->join('anoslectivos', 'anoslectivos.id', 'matriculas.it_id_anolectivo')
            ->join('classes', 'classes.id', 'matriculas.it_id_classe')
            ->join('escolas', 'escolas.id', 'matriculas.it_id_escola')
        // ->where('vc_tipoUtilizador', 'Filho')->orWhere('vc_tipoUtilizador', 'Aluno')
            ->select('users.vc_primemiroNome','users.profile_photo_path',  'users.current_team_id', 'users.vc_tipoUtilizador', 'users.id', 'users.vc_apelido', 'matriculas.id as id_matricula', 'classes.vc_classe', 'anoslectivos.ya_inicio', 'anoslectivos.ya_fim', 'escolas.vc_escola')
        ;
    }

    public function escreverFilho(Request $request, $id_user)
    {
        $lastId = User::orderBy('created_at', 'desc')->first();
        try {

            if ($request->password == $request->confirm_password) {

                $data_hoje = date("d/m/y");
                $data_nascimento = date('d/m/y', strtotime($request->dt_data_nascimento));

                $data_hoje = implode('-', array_reverse(explode('/', $data_hoje)));
                $data_nascimento = implode('-', array_reverse(explode('/', $data_nascimento)));

                $d1 = strtotime($data_hoje);
                $d2 = strtotime($data_nascimento);

                $idade = ($d1 - $d2) / (86400 * 365);
                //dd($hoje- date('d/m/y',strtotime($request->dt_data_nascimento)));

                if ($idade < 5) {
                    return redirect()->back()->with('idade', 1);
                }
                // Verifica se informou o arquivo e se é válido

                // dd($lastId['id']);

                $lastId = $lastId['id'] + 1;

                // dd($lastId);

                $fakeEmail = $request->vc_nomeUtilizador . $lastId . '@gmail.com';
                // dd($lastId['id']);
                // dd($fakeEmail);

                $upload = $this->upload_img($request);

                $dados['vc_tipoUtilizador'] = 'Filho';
//                $dados['vc_nomeUtilizador'] = $request->vc_primemiroNome . ' ' . $request->vc_nome_meio . ' ' . $request->vc_apelido;
                User::create([
                    'vc_nomeUtilizador' => $request->vc_nomeUtilizador,
                    // 'vc_email' => $request->vc_email,
                    'vc_email' => $fakeEmail,
                    'vc_tipoUtilizador' => $dados['vc_tipoUtilizador'],
                    'vc_telefone' => isset($request->vc_telefone) ? $request->vc_telefone : null,
                    'vc_primemiroNome' => $request->vc_primemiroNome,
                    'vc_nome_meio' => isset($request->vc_nome_meio) ? $request->vc_nome_meio : null,
                    'vc_apelido' => $request->vc_apelido,
                    'vc_genero' => $request->vc_genero,
                    'vc_BI' => $request->vc_BI,
                    'dt_data_nascimento' => $request->dt_data_nascimento,

                    'password' => Hash::make($request->password),
                    'current_team_id' => $id_user,
                    'profile_photo_path' => $upload,
                ]);

                $estado = $this->matricula->temFilhoNaoMatriculado(Auth::id());
                if ($estado == true) {
                    $result = $this->matriculaController->matriculasDependencias(Auth::user()->id);

                    $this->Logger->Log('info', 'Adicionou um educando ao sistema com o nome de utilizador ' . $request->vc_nomeUtilizador);
                    return view('demo.matricula.criar.index', $result);
                } else {
                    $this->Logger->Log('info', 'Adicionou um educando ao sistema com o nome de utilizador ' . $request->vc_nomeUtilizador);
                    return redirect()->back()->with('status', 1);
                }
            } else {

                return redirect()->back()->with('error2', 1);
            }
        } catch (\Exception $exception) {
// dd($exception);
            return redirect()->back()->with('error2', 1);
        }
    }

    public function upload_img(Request $request)
    {
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->foto->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->foto->storeAs('userPhoto', $nameFile);
//            dd($upload,"O");

//            $upload = substr($upload, 7, strlen($upload));
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload ( Redireciona de volta )
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
            } else {

                return $upload;
            }
        } else {

            return 'userPhoto/userPadrao.jpg';
        }
    }

    public function perfil($id)
    {
        $educandos = User::where('current_team_id', Auth::User()->id)->get();

        $c = User::find($id);
        if ($response['user'] = User::find($id)):
            $user = User::find($id);
            return view('admin.users.perfil.index', compact('user'), compact('educandos'));
        endif;
    }

    public function buscaUsuario($usuario)
    {
        // dd($usuario);
        // return "ola";
        // echo '<script>alert("Welcome to Geeks for Geeks")</script>';

        try {
            $result = User::where('vc_nomeUtilizador', $usuario)->first();

            return $result->vc_nomeUtilizador ? response()->json(['user' => $result->vc_nomeUtilizador]) : response()->json(['user' => '']);
        } catch (\Exception $exception) {

            return response()->json(['user' => '']);
        }
    }
}
