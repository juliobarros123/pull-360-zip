<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeria;
use App\Models\FotoGaleria;
use Illuminate\Support\Facades\Auth;
use App\Models\CapaTimeline;
use Exception;

class FotoGaleriaController extends Controller
{
    protected $capa_timeline;
    protected $foto_galeria;
    public function __construct(CapaTimeline $capa_timeline, FotoGaleria $foto_galeria)
    {
        $this->capa_timeline = $capa_timeline;
        $this->foto_galeria = $foto_galeria;
    }
    public function pesquisar($id_foto)
    {
        $result =  $this->foto_galeria->fotos()->where('foto_galerias.id', $id_foto)->first();
        return response()->json($result);
    }
    public function index($slug)
    {
        // dd($slug);
        $response['slug_user'] = $slug;
        $response['fotos_galeria'] = $this->foto_galeria->minhas_fotos_timeline($slug);
        $response['capa_timeline'] = $this->capa_timeline->minhas_capa_timeline($slug);
        return view('site.galeria.index', $response);
    }
    public function actualizar(Request $request, $id_foto)
    {

        if (isset($request['foto']) && $request['foto']->isValid()) {
            $propreidades = upload_img($request, 'foto', x);
            FotoGaleria::find($id_foto)->update([

                'id_user' => Auth::User()->id,
                'foto' => $propreidades["caminho"],
                'altura' => $propreidades["altura"],
                'largura' => $propreidades["largura"],
                'bits' => $propreidades["bits"],
                'mime' => $propreidades["mime"],

            ]);
        }

        FotoGaleria::find($id_foto)->update([
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'titulo' => $request->titulo,


        ]);
        return redirect()->back()->with('feedback', ['status' => '1', 'sms' => 'Imagem actualizada com sucesso']);
    }
    public function convert($corrent_path,$name_file){
        $file_path = $corrent_path.''.$name_file;
        $ext = extension_file_string($file_path);
        $exts = collect(['png', 'jpg', 'gif','webp']);
        $exts = eliminarElement($ext, $exts);
        foreach ($exts as $ext) {
            $convert_type = $ext;
            $target_dir = $corrent_path;
            $image_name = $name_file;
            convert_image($convert_type, $target_dir, $image_name, $image_quality = 100);
        }

    }
    public function cadastrar(Request $request)
    {
        try{
        $propreidades = upload_img($request, 'foto', 'fotos-galeria');
        $target_dir='storage/fotos-galeria';
        $imageName='1100312022072862e26c4f1685e.jpg';
        $convert_type= 'png';
    // dd($propreidades);
// dd($request);
       $f= FotoGaleria::create([
            'id_area'=>$request->id_area,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'titulo' => $request->titulo,
            'id_user' => Auth::User()->id,
            'foto' => $propreidades["caminho"],
            'altura' => $propreidades["altura"],
            'largura' => $propreidades["largura"],
            'bits' => $propreidades["bits"],
            'mime' => $propreidades["mime"],
            'slug' => slug_gerar()
        ]);
        $this->convert('storage/fotos-galeria', $propreidades['nameFile']);
        return redirect()->back()->with('feedback', ['status' => '1', 'sms' => 'Imagem adicionada com sucesso']);
        }catch(Exception $ex){
            dd($ex->getMessage());

        }
    }
    public function difinir_capa($slug)
    {

        $foto_galeria = FotoGaleria::where('slug', $slug)->first();
        // dd( $foto_galeria);
        CapaTimeline::create([
            'id_user' => $foto_galeria->id_user,
            'capa' => $foto_galeria["foto"],
            'titulo' => $foto_galeria["titulo"],
            'altura' => $foto_galeria["altura"],
            'largura' => $foto_galeria["largura"],
            'bits' => $foto_galeria["bits"],
            'mime' => $foto_galeria["mime"],
            'slug' => slug_gerar()
        ]);
        return redirect()->back()->with('feedback', ['status' => '1', 'sms' => 'Foto definida como capa com sucesso']);
    }
    public function comentarios($id_foto)
    {
        return response()->json($this->foto_galeria->comentarios($id_foto));
    }
    public function eliminar($id_foto){
        FotoGaleria::find($id_foto)->delete();
        return response()->json(1);
        // return redirect()->back()->with('feedback', ['status' => '1', 'sms' => 'Foto eliminada como capa com sucesso']);

    }
    public function detalhe_produto($slug){
        // $inicio_caminho/
        // dd("ola");
      $fotos_galeria=   $this->capa_timeline->capas_timeline('capa_timelines.slug',$slug);
      $response['slug_user'] = $slug;
      if(!$fotos_galeria){
        $fotos_galeria=$this->foto_galeria->fotos()->where('foto_galerias.slug', $slug);

      }
    //   dd($fotos_galeria);
      $response['fotos_galeria']=$fotos_galeria->first();
    //   resources\views\site\galeria\index.blade.php
      return view('site.detalhe-produto.index', $response);

    }
    // public function eliminar($slug_foto){
    //     FotoGaleria::where('slug',$slug_foto)->delete();
    //     return response()->json(1);
    //     // return redirect()->back()->with('feedback', ['status' => '1', 'sms' => 'Foto eliminada como capa com sucesso']);

    // }
}
