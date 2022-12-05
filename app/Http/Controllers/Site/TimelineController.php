<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CapaTimeline;
use App\Models\FotoGaleria;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    //
    protected $capa_timeline;
    protected $foto_galeria;
    public function __construct(CapaTimeline $capa_timeline, FotoGaleria $foto_galeria)
    {
        $this->capa_timeline = $capa_timeline;
        $this->foto_galeria = $foto_galeria;
    }

    public function capa_editar(Request $request)
    {

        // return response()->json($request);
        $propreidades = upload_img($request, 'capa', 'timeline/capa');
        CapaTimeline::create([
            'descricao'=>$request->descricao,
            'preco'=>$request->preco,
            'id_user' => Auth::User()->id,
            'capa' => $propreidades["caminho"],
            'titulo'=>$request->titulo,
            'altura' => $propreidades["altura"],
            'largura' => $propreidades["largura"],
            'bits' => $propreidades["bits"],
            'mime' => $propreidades["mime"],
            'slug' => slug_gerar()
        ]);
        return redirect()->back();
    }
    public function index($slug)
    {
        // dd($slug);
        $response['slug_user'] = $slug;
        $response['capa_timeline'] = $this->capa_timeline->minhas_capa_timeline($slug)->first();
        $response['fotos_galeria'] = $this->foto_galeria->minhas_fotos_timeline($slug);

        return view('timeline.index', $response);
    }
}
