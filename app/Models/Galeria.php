<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeria extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id_user',
        'capa',
        'altura',
        'largura',
        'bits',
        'mime',
        'descricao',
        'preco',
        'slug'
    ];
    public function minhas_capa_timeline($slug)
    {
        return   Galeria::join('users', 'galerias.id_user', 'users.id')->where('users.slug', $slug)
          
            ->select('galerias.*','users.*',
            'galerias.id as id_imagem',
            'users.slug as slug_user',
            'galerias.slug as slug_capa')
          
            ->orderBy('galerias.id', 'desc')
            ->get();
    }
}
