<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FotoGaleria;

class PesquisaController extends Controller
{
    //
    protected $foto_galeria;
    public function __construct(FotoGaleria $foto_galeria)
    {

        $this->foto_galeria = $foto_galeria;
    }
    public function pesquisar($texto)
    {
        try {
            $r = $this->foto_galeria->fotos()
                ->where('foto_galerias.titulo', 'like', '%' . $texto . '%')
                ->orWhere('foto_galerias.titulo', 'like', '%' . $texto)
                ->Where('foto_galerias.titulo', 'like', $texto.'%')
                ->orWhere('areas.area', 'like', $texto.'%')
                // ->orWhere('foto_galerias.descricao', 'like', '%' . $texto . '%')
                // ->orWhere('foto_galerias.descricao', 'like', $texto . '%')
                // ->orWhere('foto_galerias.descricao', 'like', '%' . $texto)
                ->orderBy('foto_galerias.id','desc')->get();
            return response()->json($r);
        } catch (\Exception $f) {
            return response()->json($f->getMessage());
        }
    }
}
