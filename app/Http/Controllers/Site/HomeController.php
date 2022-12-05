<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\CapaTimeline;
use App\Models\FotoGaleria;
use App\Models\Area;
class HomeController extends Controller
{
    protected $capa_timeline;
    protected $foto_galeria;
    public function __construct(CapaTimeline $capa_timeline, FotoGaleria $foto_galeria)
    {
        $this->capa_timeline = $capa_timeline;
        $this->foto_galeria = $foto_galeria;
    }
    public function painel()
    {
      
   
        return view('site.painel.index');
    }

    public function index( )
    {
        // dd(convert());
        
               $response['imagens']=$this->foto_galeria->fotos()->get();
            // $response['capas']=$this->capa_timeline->capas_timeline();
            // // dd($response['capas']);
            return view('site.index',$response);
        
    
 
    }
}