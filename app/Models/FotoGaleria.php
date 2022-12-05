<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class FotoGaleria extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id_area',
        'id_user',
        'foto',
        'altura',
        'largura',
        'bits',
        'titulo',
        'mime',
        'descricao',
        'preco',
        'slug'
    ];
    public function minhas_fotos_timeline($slug)
    {
        return   FotoGaleria::join('users', 'foto_galerias.id_user', 'users.id')->where('users.slug', $slug)
        ->join('areas', 'areas.id', 'foto_galerias.id_area')
            ->select(
                'foto_galerias.*',
                'users.*',
                'foto_galerias.id as id_foto',
                'users.slug as slug_user',
                'foto_galerias.slug as slug_foto',
                'areas.area'
            )

            ->orderBy('foto_galerias.id', 'desc')
            ->get();
    }
    public function fotos()
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
    public function comentarios($id_foto)
    {
        return FotoComentario::join('users', 'foto_comentarios.id_user', 'users.id')
            ->select('foto_comentarios.*', 'users.profile_photo_path', 'users.vc_primemiroNome', 'users.vc_apelido')
            ->where('foto_comentarios.id_foto_galeria', $id_foto)->get();
    }
}
