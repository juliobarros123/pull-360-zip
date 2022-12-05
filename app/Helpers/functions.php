
<?php

use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\ClasseDisciplina;
use App\Models\FotoComentario;
use App\Models\FuncionarioEscola;
use App\Models\LogAcessoSaida;
use App\Models\Materia;
use App\Models\Matricula;
use App\Models\MeuSobre;
use App\Models\NotificacaoMateria;
use App\Models\NotificacaoTarefa;
use App\Models\NotificacaoVistaMateria;
use App\Models\NotificacaoVistaTarefa;
use App\Models\PDF;
use App\Models\Tarefa;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoYoutube;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Keygen\Keygen;


use Gregwar\Image\Image;



function convert_image($convert_type, $target_dir, $image_name, $image_quality=100){
    $target_dir = "$target_dir/";
    
    $image = $target_dir.$image_name;
    
    //remove extension from image;
    $img_name = remove_extension_from_image($image);
    
    //to png
    if($convert_type == 'png'){
        $binary = imagecreatefromstring(file_get_contents($image));
        //third parameter for ImagePng is limited to 0 to 9
        //0 is uncompressed, 9 is compressed
        //so convert 100 to 2 digit number by dividing it by 10 and minus with 10
        $image_quality = floor(10 - ($image_quality / 10));
        ImagePNG($binary, $target_dir.$img_name.'.'.$convert_type, $image_quality);
        return $img_name.'.'.$convert_type;
    }
    
    //to jpg
    if($convert_type == 'jpg'){
        $binary = imagecreatefromstring(file_get_contents($image));
        imageJpeg($binary, $target_dir.$img_name.'.'.$convert_type, $image_quality);
        return $img_name.'.'.$convert_type;
    }		
    //to gif
    if($convert_type == 'gif'){
        $binary = imagecreatefromstring(file_get_contents($image));
        imageGif($binary, $target_dir.$img_name.'.'.$convert_type, $image_quality);
        return $img_name.'.'.$convert_type;
    }	
    if($convert_type == 'webp'){
        $binary = imagecreatefromstring(file_get_contents($image));
        imageWebp($binary, $target_dir.$img_name.'.'.$convert_type, $image_quality);
        return $img_name.'.'.$convert_type; 
    }			
    return false; 
}
 function remove_extension_from_image($image){
    $extension = get_image_type($image); //get extension
    $only_name = basename($image, '.'.$extension); // remove extension
    return $only_name;
}
 function get_image_type($target_file){
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    return $imageFileType;
}
function extension_file_string($file_path)
{
    $ext = explode('.', $file_path)[count(explode('.', $file_path)) - 1];
    return $ext;
}
function convert(){
    $exts=collect(['png','jpg','bmp','pdf','zip']);
 $ext=   extension_file_string('storage/fotos-galeria/1011222022080162e7a6caeca80.png');
dd( $ext);

    $imagem = imagecreatefrompng('storage/fotos-galeria/1011222022080162e7a6caeca80.png'); //cria uma imagem PNG a partir do caminho
    $w = imagesx($imagem); //largura da imagem original
    $h = imagesy($imagem); //altura da imagem original
    $temp = imagecreatetruecolor(280, 280); //Cria uma imagem 280x280 vazia
    imagecopyresized($temp, $imagem, 0, 0, 0, 0, 280, 280, $w, $h); //Copia a imagem original já redimensionada pra imagem que estava vazia
    imagejpeg($temp, 'storage/fotos-galeria/' . 'fotoJULIO' . '.jpg', 90); //Converte e salva como JPG com qualidade 90
    //imagino que tu vá colocar algo entre 'foto' e a extensão pra diferenciar os nomes dos arquivos
    // imagedestroy($imagem);
    // imagedestroy($temp);
}

// function size($arquivo)
// {
//     $size = $arquivo->getSize();
//     $result_size = $size * (1.0 * pow(10, -6));
//     $true_size = number_format($result_size, 2, '.', '');
//     return $size;
// }

function formatBytes($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}


function logs_acesso($id_user)
{
    $logs = LogAcessoSaida::where('id_user', $id_user)->orderBy('id', 'desc')->limit(8)->get();
    return $logs;
}
function frequencia_uso($id_user)
{

    $qtMeusAcessos = LogAcessoSaida::groupBy('id_user')->select('*', DB::raw('count(log_acesso_saidas.id) as qt'))->where('id_user', $id_user)->first();
    $qtMeusAcessos = isset($qtMeusAcessos) ? $qtMeusAcessos->qt : 0;
    $qtMeusAcessosMax = LogAcessoSaida::groupBy('id_user')->select('*', DB::raw('count(log_acesso_saidas.id) as qt'))->get()->max('qt');

    $result = $qtMeusAcessos / $qtMeusAcessosMax;
    $frequencia = $result * 100;
    return  number_format($frequencia, 0);
    // $logs = LogAcessoSaida::where('id_user', $id_user);

}
function logs_acesso_educando($id_user)
{
    $logs = LogAcessoSaida::where('id_user', $id_user);
    return $logs;
}

function tarefas($id_user)
{
    $ano_lectivo = AnoLectivo::orderBy('id', 'desc')->first();

    $data['tarefas'] = DB::table('tarefas')
        ->join('classe_disciplinas', function ($join) {
            $join->on('tarefas.id_classe_disciplinas', '=', 'classe_disciplinas.id');
        })->join('classes', function ($join) {
            $join->on('classe_disciplinas.classe_id', '=', 'classes.id');
        })->join('disciplinas', function ($join) {
            $join->on('classe_disciplinas.disciplina_id', '=', 'disciplinas.id');
        })->join('matriculas', function ($join) {
            $join->on('matriculas.it_id_classe', '=', 'classes.id');
        })->join('anoslectivos', 'anoslectivos.id', 'matriculas.it_id_anolectivo')
        ->where('tarefas.it_estado', '=', 1)
        ->where('matriculas.it_id_anolectivo', '=', $ano_lectivo->id)
        ->where('matriculas.it_id_utilizador', '=', $id_user);
    return $data['tarefas'];
}

function materias($id_user)
{
    $ano_lectivo = AnoLectivo::orderBy('id', 'desc')->first();

    return DB::table('materias')
        ->join('horarios', function ($join) {
            $join->on('horarios.id', '=', 'materias.id_horarios');
        })
        ->join('dias_semanas', 'dias_semanas.id', 'horarios.it_id_dias')
        ->join('anoslectivos', function ($join) {
            $join->on('horarios.it_id_anoslectivos', '=', 'anoslectivos.id');
        })
        ->join('classe_disciplinas', function ($join) {
            $join->on('horarios.it_id_classedisciplina', '=', 'classe_disciplinas.id');
        })->join('classes', function ($join) {
            $join->on('classe_disciplinas.classe_id', '=', 'classes.id');
        })->join('disciplinas', function ($join) {
            $join->on('classe_disciplinas.disciplina_id', '=', 'disciplinas.id');
        })
        ->join('matriculas', function ($join) {
            $join->on('matriculas.it_id_classe', '=', 'classes.id');
        })->join('users', function ($join) {
            $join->on('matriculas.it_id_utilizador', '=', 'users.id');
        })
        ->where('matriculas.it_id_anolectivo', '=', $ano_lectivo->id)
        ->where('materias.it_estado', 1)
        ->where('matriculas.it_id_utilizador', $id_user);
}

function disciplinas_lecionadas($id_professor)
{
    $funcionario = FuncionarioEscola::where('it_id_utilizador', '=', $id_professor)->first();
    if ($funcionario) {
        $classesDisciplinas = ClasseDisciplina::find($funcionario->it_id_classedisciplina);
        $classe = Classe::find($classesDisciplinas->classe_id);
        //    dd(   $classesDisciplinas)
        $classesDisciplinas = DB::table('classe_disciplinas')
            ->join('classes', function ($join) {
                $join->on('classes.id', '=', 'classe_disciplinas.classe_id');
            })
            ->join('disciplinas', function ($join) {
                $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
            })->join('funcionario_escolas', function ($join) {
                $join->on('funcionario_escolas.it_id_classedisciplina', '=', 'classe_disciplinas.id');
            })
            // ->where('classes.vc_classe', '<=',  $classe->vc_classe)
            ->where('funcionario_escolas.it_id_utilizador', '=', $id_professor)
            ->select('classe_disciplinas.id as id_c_d', 'classe_disciplinas.*', 'disciplinas.*', 'classes.*')
            ->get();
        return $classesDisciplinas;
    }
}

function ciclos_professores($id_professor)
{
    $classesDisciplinas = ClasseDisciplina::join('classes', 'classes.id', 'classe_disciplinas.classe_id')
        ->join('disciplinas', function ($join) {
            $join->on('disciplinas.id', '=', 'classe_disciplinas.disciplina_id');
        })->join('funcionario_escolas', function ($join) {
            $join->on('funcionario_escolas.it_id_classedisciplina', '=', 'classe_disciplinas.id');
        })
        ->where('classe_disciplinas.it_estado', '=', 1)
        ->where('funcionario_escolas.it_id_utilizador', '=', $id_professor)
        ->select('classe_disciplinas.id as id_c_d', 'classe_disciplinas.*', 'disciplinas.*', 'classes.*')
        ->get();
    $ensinos = array();

    $ensino_primario = $classesDisciplinas->where('vc_classe', '<=', 4)->count();
    // dd( $classesDisciplinas);
    if ($ensino_primario) {
        array_push($ensinos, '1º');
    }
    $ensino_secundario = $classesDisciplinas->where('vc_classe', '>=', 7)->count();

    if ($ensino_secundario) {
        array_push($ensinos, ' 2º');
    }

    // dd($ensinos);
    return $ensinos;
}

function ttl_teleaulas()
{
    $result = Video::count() + VideoYoutube::count();
    return $result;
}

function ttl_pdfs()
{
    $result = PDF::count();
    return $result;
}
function ttlAulasPorClasse($it_id_classe, $id_anoLectivo)
{
    return  DB::table('materias')
        ->join('horarios', 'horarios.id', 'materias.id_horarios')
        ->join('anoslectivos', 'horarios.it_id_anoslectivos', 'anoslectivos.id')
        ->join('classe_disciplinas', 'materias.it_id_classeDisciplina', 'classe_disciplinas.id')
        ->join('classes', 'classe_disciplinas.classe_id', 'classes.id')

        ->where('materias.it_estado', 1)
        ->where('horarios.it_id_anoslectivos', $id_anoLectivo)
        ->where('classes.id', $it_id_classe)
        ->count();
}
function ttl_aulas()
{
    $result = Materia::count();
    return $result;
}
function ttl_tarefas()
{
    $result = Tarefa::count();
    return $result;
}
function aulas($it_id_classe, $id_anoLectivo)
{
    $materias =  DB::table('materias')
        ->join('horarios', 'horarios.id', 'materias.id_horarios')
        ->join('anoslectivos', 'horarios.it_id_anoslectivos', 'anoslectivos.id')
        ->join('classe_disciplinas', 'materias.it_id_classeDisciplina', 'classe_disciplinas.id')
        ->join('classes', 'classe_disciplinas.classe_id', 'classes.id')
        ->join('disciplinas', 'classe_disciplinas.disciplina_id', 'disciplinas.id')
        ->join('dias_semanas', 'dias_semanas.id', 'horarios.it_id_dias')
        ->where('materias.it_estado', 1)
        ->where('horarios.it_id_anoslectivos', $id_anoLectivo)
        ->where('classes.id', $it_id_classe)
        ->limit(4)->orderBy("materias.id", "desc")->select("materias.*", 'disciplinas.vc_disciplina', 'dias_semanas.vc_dia')->get();
    return $materias;
}
function slug_gerar()
{

    $slug = Keygen::numeric(2)->generate() . uniqid(date('HisYmd')) . Keygen::numeric(4)->generate();

    return $slug;
}

function notificacoes_materia()
{
    // Auth::id();

    $vinculado = Matricula::where('it_id_utilizador', Auth::id())->first();

    $notificoes_materia = NotificacaoMateria::join('materias', 'materias.id', 'notificacao_materias.id_materia')
        ->join('classe_disciplinas', 'classe_disciplinas.id', 'notificacao_materias.it_id_classedisciplina')
        ->join('classes', 'classe_disciplinas.classe_id', 'classes.id')
        ->join('disciplinas', 'classe_disciplinas.disciplina_id', 'disciplinas.id')
        ->orderBy('materias.created_at', 'desc');

    if (Auth::User()->vc_tipoUtilizador == 'Filho') {

        $notificoes_materia = $notificoes_materia->where('classes.id', $vinculado->it_id_classe)
            ->select('notificacao_materias.id', 'materias.id as id_materia', 'notificacao_materias.created_at', 'notificacao_materias.notificacao', 'materias.it_id_classeDisciplina', 'materias.it_id_classeDisciplina', 'materias.it_id_unidadeMateria')
            ->get();
    } else
    if (Auth::User()->vc_tipoUtilizador == 'Encarregado') {

        $classes =   intervaloDeClasseFilhos(Auth::User()->id);
        $notificoes_materia = $notificoes_materia
            ->where('classes.vc_classe', '>=',  $classes['max_classe'])
            ->where('classes.vc_classe', '<=',  $classes['min_classe'])
            ->select('notificacao_materias.id', 'materias.id as id_materia', 'notificacao_materias.created_at', 'notificacao_materias.notificacao', 'materias.it_id_classeDisciplina', 'materias.it_id_classeDisciplina', 'materias.it_id_unidadeMateria')

            ->get();
    } else if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Diretor Municipal' || Auth::User()->vc_tipoUtilizador == 'Encarregado' || Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Supervisor' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Professor') {
        $notificoes_materia = $notificoes_materia->select('notificacao_materias.id', 'materias.id as id_materia', 'notificacao_materias.created_at', 'notificacao_materias.notificacao', 'materias.it_id_classeDisciplina', 'materias.it_id_classeDisciplina', 'materias.it_id_unidadeMateria')
            ->get();
    }

    return $notificoes_materia;
    // dd( $notificoes_materia);
}
function intervaloDeClasseFilhos($id_encarregado)
{
    $educandos = educando_matricula()->where('users.current_team_id', Auth::id())->get();
    $response['max_classe'] = $educandos->max('vc_classe');
    $response['min_classe'] = $educandos->max('vc_classe');
    return $response;
}
function notificacoes_terefa()
{
    // Auth::id();
    $vinculado = Matricula::where('it_id_utilizador', Auth::id())->first();

    $notificoes_tarefa = NotificacaoTarefa::join('tarefas', 'tarefas.id', 'notificacao_tarefas.id_tarefa')
        ->join('classe_disciplinas', 'classe_disciplinas.id', 'notificacao_tarefas.it_id_classedisciplina')
        ->join('classes', 'classe_disciplinas.classe_id', 'classes.id')
        ->join('disciplinas', 'classe_disciplinas.disciplina_id', 'disciplinas.id')
        ->orderBy('tarefas.created_at', 'desc');
    if (Auth::User()->vc_tipoUtilizador == 'Filho') {
        $notificoes_tarefa = $notificoes_tarefa->where('classes.id', $vinculado->it_id_classe)
            ->select('notificacao_tarefas.id', 'notificacao_tarefas.created_at', 'notificacao_tarefas.notificacao', 'tarefas.id_classe_disciplinas')
            ->get();
    } else
    if (Auth::User()->vc_tipoUtilizador == 'Encarregado') {

        $classes =   intervaloDeClasseFilhos(Auth::User()->id);
        $notificoes_tarefa = $notificoes_tarefa
            ->where('classes.vc_classe', '>=',  $classes['max_classe'])
            ->where('classes.vc_classe', '<=',  $classes['min_classe'])
            ->select('notificacao_tarefas.id', 'notificacao_tarefas.created_at', 'notificacao_tarefas.notificacao', 'tarefas.id_classe_disciplinas')
            ->get();
    } else if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Diretor Municipal' || Auth::User()->vc_tipoUtilizador == 'Encarregado' || Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Supervisor' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Professor') {
        $notificoes_tarefa = $notificoes_tarefa->select('notificacao_tarefas.id', 'notificacao_tarefas.created_at', 'notificacao_tarefas.notificacao', 'tarefas.id_classe_disciplinas')
            ->get();
    }

    return $notificoes_tarefa;
    // dd( $notificoes_materia);
}

function notificacoes()
{
    $nots_materia = notificacoes_materia();
    // dd($nots_materia);
    $nots_tarefas = notificacoes_terefa();
    // $notificacoes=$nots_materia->merge($nots_tarefas);
    foreach ($nots_tarefas as $not) {
        $nots_materia->push($not);
    }
    // dd(    $nots_materia);
    $nots_materia = $nots_materia->sortBy([
        ['created_at', 'desc'],
    ]);

    $nots_materia->values()->all();
    // $notificacoes->all();
    //  $notificacoes=$nots_materia->sortBy('created_at');
    $notificacoes = $nots_materia;
    // $notificacoes->all();
    return $notificacoes;
    // dd(notificacoes_terefa()notificacoes_materia());
}
function quantos_dias($timestamps)
{

    // $data_inicio = new DateTime($timestamps);
    // $data_fim = new DateTime(date('Y-m-d h:i:s'));

    // Resgata diferença entre as datas
    $dateInterval = datetimeDiff($timestamps, date('Y-m-d H:i:s'));

    if ($dateInterval->day != 0) {
        return $dateInterval->day . ' dias atrás';
    } else if ($dateInterval->hour != 0) {
        return $dateInterval->hour . ' horas atrás';
    } else if ($dateInterval->min != 0) {
        return $dateInterval->min . ' minutos atrás';
    } else {
        return $dateInterval->sec . ' segundos atrás';
    }
}
function datetimeDiff($dt1, $dt2)
{
    $t1 = strtotime($dt1);
    $t2 = strtotime($dt2);

    $dtd = new stdClass();
    $dtd->interval = $t2 - $t1;
    $dtd->total_sec = abs($t2 - $t1);
    $dtd->total_min = floor($dtd->total_sec / 60);
    $dtd->total_hour = floor($dtd->total_min / 60);
    $dtd->total_day = floor($dtd->total_hour / 24);

    $dtd->day = $dtd->total_day;
    $dtd->hour = $dtd->total_hour - ($dtd->total_day * 24);
    $dtd->min = $dtd->total_min - ($dtd->total_hour * 60);
    $dtd->sec = $dtd->total_sec - ($dtd->total_min * 60);
    return $dtd;
}
function videoPdfs($id_video)
{
    $result =  DB::table('video_p_d_f_s')
        ->join('p_d_f_s', 'video_p_d_f_s.id_pdf', '=', 'p_d_f_s.id')
        ->where('p_d_f_s.it_estado', 1)
        ->where('id_video', $id_video)
        ->select('p_d_f_s.*')
        ->get();
    return $result;
}
function videoAudios($id_video)
{
    $result =  DB::table('video_audio')
        ->join('audio', 'video_audio.id_audio', '=', 'audio.id')
        ->where('audio.it_estado', 1)
        ->where('id_video', $id_video)
        ->select('audio.*')
        ->get();
    return $result;
}
function educando_matricula()
{
    return User::join('matriculas', 'users.id', 'matriculas.it_id_utilizador')
        ->join('anoslectivos', 'anoslectivos.id', 'matriculas.it_id_anolectivo')
        ->join('classes', 'classes.id', 'matriculas.it_id_classe')
        ->join('escolas', 'escolas.id', 'matriculas.it_id_escola')
        // ->where('vc_tipoUtilizador', 'Filho')->orWhere('vc_tipoUtilizador', 'Aluno')
        ->select('classes.vc_classe', 'users.vc_primemiroNome', 'users.current_team_id', 'users.vc_tipoUtilizador', 'users.id as id', 'users.vc_apelido', 'matriculas.id as id_matricula', 'classes.vc_classe', 'anoslectivos.ya_inicio', 'anoslectivos.ya_fim', 'escolas.vc_escola');
}

function notificacaoVista($id_notificacao)
{
    $notificacao = NotificacaoMateria::find($id_notificacao);
    $notificacaoVista = NotificacaoVistaMateria::where('id_materia', $notificacao->id_materia)->where('it_idUser', Auth::id())->first();
    if ($notificacaoVista) {
        return $notificacaoVista->visto;
    }
}

function notificacaoVistaTarefa($id_notificacao)
{
    $notificacao = NotificacaoTarefa::find($id_notificacao);
    // dd( $notificacao);
    $notificacaoVista = NotificacaoVistaTarefa::where('id_tarefa', $notificacao->id_tarefa)->where('it_idUser', Auth::id())->first();
    if ($notificacaoVista) {
        return $notificacaoVista->visto;
    }
}
function disativarNotificacao($id_materia, $id_user)
{
    $estado = NotificacaoVistaMateria::where('id_materia', $id_materia)->where('it_idUser', $id_user)->count();

    if (!$estado) {
        NotificacaoVistaMateria::create(
            [
                'id_materia' => $id_materia,
                'it_idUser' => $id_user,
                'visto' => 1,

            ]
        );
    }
}
function disativarNotificacaoTarefa($id_tarefa, $id_user)
{
    $estado = NotificacaoVistaTarefa::where('id_tarefa', $id_tarefa)->where('it_idUser', $id_user)->count();

    if (!$estado) {
        NotificacaoVistaTarefa::create(
            [
                'id_tarefa' => $id_tarefa,
                'it_idUser' => $id_user,
                'visto' => 1,

            ]
        );
    }
}
function comentarios($slug)
{
    return FotoComentario::where('slug',$slug);
}
function meu_sobre($id){
   return MeuSobre::find($id);

}



function upload_img($request, $input, $caminho)
{


    if (isset($request[$input]) && $request[$input]->isValid()) {

        // Define um aleatório para o arquivo baseado no timestamps atual
        $name = uniqid(date('HisYmd'));

        // Recupera a extensão do arquivo
        $extension = $request[$input]->extension();

        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";
      
       
        // Faz o upload:
        $upload = $request[$input]->storeAs($caminho, $nameFile);
      
        //            dd($upload,"O");

        //            $upload = substr($upload, 7, strlen($upload));
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

        // Verifica se NÃO deu certo o upload ( Redireciona de volta )
       
        if (!$upload) {

            return -1;
        } else {
            $size= getimagesize('storage/'.$upload);

     return ['caminho'=>$upload,'altura'=>$size[0],'largura'=>$size[1],'bits'=>$size["bits"],'mime'=>$size["mime"],'nameFile'=>$nameFile];
           
        }
    } else {
        $size= getimagesize('storage/timeline/capa/capa.jpg');
        return ['caminho'=>'timeline/capa/capa.jpg','altura'=>$size[0],'largura'=>$size[1],'bits'=>$size["bits"],'mime'=>$size["mime"],'nameFile'=>$nameFile]; 
   
    }
}

function js_flickity_images()
{
    return  DB::table('foto_galerias')
    ->join('users', 'foto_galerias.id_user', 'users.id')
    ->join('areas', 'areas.id', 'foto_galerias.id_area')
    ->select(
        'foto_galerias.*',
        'users.*',
        'foto_galerias.id as id_foto',
        'users.slug as slug_user',
        'foto_galerias.slug as slug_foto',
        'areas.area'
    )
    ->where('foto_galerias.deleted_at', NULL)
    ->orderBy('foto_galerias.id', 'desc');
}
function eliminarElement($element, $collection)
{

    $keys = $collection->keys();
    $keys->all();
    foreach ($keys as $key) {
        if ($collection[$key] == $element) {
            $collection =  $collection->except([$key]);
            return  $collection;
        }
    }
}
?>