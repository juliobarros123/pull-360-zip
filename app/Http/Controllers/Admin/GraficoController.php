<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Support\Facades\DB;
use App\Models\Disciplina;
use App\Models\AnoLectivo;


class GraficoController extends Controller
{
    //
    public function data_grafigos()
    {
        //  $dados= Empresa::where('vc_estadoaprovacao', 1)->get();
        try {
            $provinciasObject = (object) [
                 'Bengo'
                ,'Benguela'
                , 'Bié'
                , 'Cabinda'
                , 'Cunene'
                , 'Huambo'
                , 'Huíla'
                , 'Kuando Kubango'
                , 'Kwanza Norte'
                , 'Kwanza Sul'
                , 'Luanda'
                , 'Lunda Norte'
                , 'Lunda Sul'
                , 'Malange'
                , 'Moxico'
                , 'Namibe'
                , 'Uíge'
                , 'Zaire'
                
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

            $classes_grafico = array();
            $alunos_grafico = array();
            $classes = Classe::where('it_estado', 1)->get();

            foreach ($classes as $classe) {
                $qtalunos = DB::table('matriculas')
                    ->where('matriculas.it_estado', 1)
                    ->join('classes', 'matriculas.it_id_classe', 'classes.id')
                    ->where('classes.id', $classe->id)->count();

                array_push($classes_grafico, $classe->vc_classe . 'ª Classe');
                array_push($alunos_grafico, $qtalunos);
            }

            $ttl_alunos = DB::table('matriculas')
                ->where([['matriculas.it_estado', 1], ['escolas.it_estado', 1]])
                ->join('escolas', 'matriculas.it_id_escola', 'escolas.id')
                ->count();

            $dados = [
                'alunos' => $alunos,
                'provincias' => $provincias,
                'classes_grafico' => $classes_grafico,
                'alunos_grafico' => $alunos_grafico,
                'ttl_alunos' => $ttl_alunos,
            ];

            return response()->json($dados);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function data_grafigo_gestor()
    {

      
        try {
            $id_anoLectivo=AnoLectivo::max('id');
            $disciplinasObject =Disciplina::where('it_estado', 1)->get();
            $materias = array();
            $disciplinas = array();
            $ttl_materias= DB::table('materias')
            ->join('horarios','horarios.id', 'materias.id_horarios')
            ->join('anoslectivos','horarios.it_id_anoslectivos', 'anoslectivos.id')
            ->join('classe_disciplinas','materias.it_id_classeDisciplina', 'classe_disciplinas.id')
            ->join('disciplinas','classe_disciplinas.disciplina_id','disciplinas.id')
            ->where('materias.it_estado', 1)
            ->where('horarios.it_id_anoslectivos', $id_anoLectivo)
         
            ->count();
            foreach ($disciplinasObject as $disciplina) {
                $qtmaterias = DB::table('materias')
                ->join('horarios','horarios.id', 'materias.id_horarios')
                ->join('anoslectivos','horarios.it_id_anoslectivos', 'anoslectivos.id')
                ->join('classe_disciplinas','materias.it_id_classeDisciplina', 'classe_disciplinas.id')
                ->join('disciplinas','classe_disciplinas.disciplina_id','disciplinas.id')
                ->where('materias.it_estado', 1)
                ->where('horarios.it_id_anoslectivos', $id_anoLectivo)
                ->where('disciplinas.id',$disciplina->id)
                ->count();
                array_push($materias, $qtmaterias);
                array_push($disciplinas, $disciplina->vc_disciplina);
            }


            $materias_classes_grafico = array();
            $classes_grafico=array();
            $classes = Classe::where('it_estado', 1)->get();
            // $classes_grafico = array();
            // $alunos_grafico = array();
            // $classes = Classe::where('it_estado', 1)->get();

            foreach ($classes as $classe) {
                $qtmaterias_classe = DB::table('materias')
                ->join('horarios','horarios.id', 'materias.id_horarios')
                ->join('anoslectivos','horarios.it_id_anoslectivos', 'anoslectivos.id')
                ->join('classe_disciplinas','materias.it_id_classeDisciplina', 'classe_disciplinas.id')
                ->join('classes','classe_disciplinas.classe_id','classes.id')
                ->where('materias.it_estado', 1)
                ->where('horarios.it_id_anoslectivos', $id_anoLectivo)
                ->where('classes.id',$classe->id)
                ->count();
                
                array_push($materias_classes_grafico, $qtmaterias_classe);
                array_push($classes_grafico, $classe->vc_classe. 'ª Classe');
            }


            $dados = [
                'materias' => $materias,
                'disciplinas' => $disciplinas,
                'ttl_materias'=>$ttl_materias,
                'materias_classes_grafico'=>$materias_classes_grafico,
                'classes_grafico'=>$classes_grafico

                
            ];

            return response()->json($dados);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
}
