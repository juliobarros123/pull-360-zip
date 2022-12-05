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

namespace App\Http\Controllers\Site;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Models\CapaTimeline;
use App\Models\DependenciaProfessor;
use App\Models\TermoUtilizador;
use App\Models\User;
use App\Models\Disciplina;
use App\Providers\RouteServiceProvider;
use App\Repositories\Eloquent\UtilizadorRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\FuncionarioEscola;

class UserController extends Controller
{
    use PasswordValidationRules;

    protected $user;
    protected $email;
    public function __construct(UtilizadorRepository $user)
    {
        $this->user = $user;
    }

    public function cadastrarProfessor(Request $request)
    {

        try {

            if ($this->vrf_dependencias($request->it_num_agente, $request->vc_BI)) {

                // $path = Storage::putFile('userPhoto', $request->file('foto'));
                // dd( $path);
                $dados = $request->all();

                $dados['vc_tipoUtilizador'] = 'Professor';
                $dados['profile_photo_path'] = $this->upload_img($request);

                // dd("oa", $dados['profile_photo_path'] );

                // dd( $dados['profile_photo_path'] );
                // Validator::make($dados, [
                //     // 'vc_nomeUtilizador' => ['required', 'string', 'max:255'],
                //     'vc_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                //     'password' => $this->passwordRules(),
                // ])->validate();
                // dd(     $dados);

                // dd("ola");
                $user = $this->user->store($dados);

                if ($request->docencia == "monodocencia") {
                    $classesDisciplinas = DB::table('classe_disciplinas')
                        ->join('classes', function ($join) {
                            $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
                        })
                        ->join('disciplinas', function ($join) {
                            $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
                        })
                        // ->where('classes.vc_classe', '<=',  $classe->vc_classe)
                        ->where('classes.id', '=', $request->id_classe)
                        ->select('classe_disciplinas.id')
                        ->get();

                    foreach ($classesDisciplinas as $classesDisciplina)
                        FuncionarioEscola::create(

                            [
                                'it_id_escola' => $request->it_id_escola,
                                'it_id_classedisciplina' => $classesDisciplina->id,
                                'it_id_utilizador' => $user->id,

                            ]
                        );
                } else if ($request->docencia == "pluridocencia") {
                    $disciplinas = Disciplina::where('it_estado', 1)->get();
                    foreach ($disciplinas as $disciplina) {
                        if (isset($request[$disciplina->id])) {
                            $classesDisciplina = DB::table('classe_disciplinas')
                                ->join('classes', function ($join) {
                                    $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
                                })
                                ->join('disciplinas', function ($join) {
                                    $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
                                })
                                ->where('disciplinas.id', $disciplina->id)
                                ->where('classes.id', '=', $request->id_classe)
                                ->select('classe_disciplinas.id')
                                ->first();
                            FuncionarioEscola::create(

                                [
                                    'it_id_escola' => $request->it_id_escola,
                                    'it_id_classedisciplina' => $classesDisciplina->id,
                                    'it_id_utilizador' => $user->id,

                                ]
                            );
                        }
                    }
                }
                // $this->emailSend($request->vc_email);
                if ($user && $dados['termo'] == 'on') {
                    TermoUtilizador::create([
                        'it_id_utilizador' => $user->id,
                    ]);
                    event(new Registered($user));

                    Auth::login($user);

                    return redirect(RouteServiceProvider::HOME);
                    return redirect('login')->with('conta_criada', '1');
                } else {

                    return redirect()->back()->with('aviso', '1');
                }
            } else {

                return redirect()->back()->with('dependencias', '1');
            }
        } catch (\Exception $exception) {

            return redirect()->back()->with('error', '1');
        }
    }

    public function vrf_dependencias($numero_agente, $bi)
    {

        return DependenciaProfessor::where('it_numero_agente', $numero_agente)->where('vc_BI', $bi)->count();
    }
    public function create()
    {
        $uri = 'ops';

        return view('site.encarregado.index', compact('uri'));
    }
    public function increver_se()
    {
        $uri = 'ops';

        return view('auth.registerLogin', compact('uri'));
    }

    public function salvar(Request $request)
    {
        try {
    

            // $path = Storage::putFile('userPhoto', $request->file('foto'));
            // dd( $path);
            $dados = $request->all();
            $dados['vc_tipoUtilizador'] = 'Artista';
            $user = $this->user->store($dados);

            $propreidades = upload_img($request, 'capa', 'timeline/capa');

            CapaTimeline::create([
               
                'id_user' => $user->id,
                'capa' => $propreidades["caminho"],
                'altura' => $propreidades["altura"],
                'largura' => $propreidades["largura"],
                'bits' => $propreidades["bits"],
                'mime' => $propreidades["mime"],
                'slug' => slug_gerar()
            ]);
            // $this->emailSend($request->vc_email);
            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
            return redirect('login')->with('encarregado', '1');
        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->back()->with('error', '1');
        }
    }

    public function emailSend($email)
    {
        $this->email = $email;
        try {
            $data = [];
            $r = Mail::send('emails.abertura-conta', $data, function ($message) {
                $message->from('xilonga@itel.gov.ao', 'Xilonga');
                $message->subject('Abertura de conta');
                $message->to($this->email);
            });
            return  $r;
        } catch (\Exception $exception) {
        }
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

    public function editar($id)
    {
        if (!$this->validar_autoria($id)) {

            return redirect()->back()->with('edicao_nao_autorizado', 1);
        }
        $c = User::find($id);
        if ($response['user'] = User::find($id)) :
            $user = User::find($id);
            return view('site.users.editar.index', compact('user'));
        else :
            return redirect('site/users/cadastrar')->with('teste', '1');

        endif;
    }

    public function validar_autoria($id)
    {

        if ($id == Auth::user()->id) {
            return true;
        } else if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor') {
            return true;
        } else {
            return false;
        }
    }
}
