<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class CapaTimeline extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id_user',
        'capa',
        'titulo',
        'altura',
        'largura',
        'bits',
        'descricao',
        'preco',
        'mime',
        'slug'
    ];
    public function minhas_capa_timeline($slug)
    {
        return   CapaTimeline::join('users', 'capa_timelines.id_user', 'users.id')->where('users.slug', $slug)

            ->select('capa_timelines.*')
            ->orderBy('capa_timelines.id', 'desc')
            ->get();
    }
    public function capas_timeline()
    {

        $collection =  CapaTimeline::join('users', 'capa_timelines.id_user', 'users.id')
        ->join('foto_galerias', 'foto_galerias.foto', 'capa_timelines.capa')
            ->select(
                'capa_timelines.*',
                'users.*',
                'foto_galerias.id as id_foto',
                'capa_timelines.id as id_capa',
                'users.slug as slug_user',
                'capa_timelines.slug as slug_capa'
            )
            ->distinct('capa_timelines.capa')
            ->get();
        $unique = $collection->unique();

        $d= $unique->values()->all();
    return $d;
    }
}
