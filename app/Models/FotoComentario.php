<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FotoComentario extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'comentario',
        'id_foto_galeria',
        'id_user',
        'slug'
    ];
}
