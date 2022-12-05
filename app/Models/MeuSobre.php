<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MeuSobre extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'saudacao',
        'descricao',
        'id_user',
        'slug'
    ];
    public function meu_sobre($slug){
     return   MeuSobre::rightJoin('users', 'meu_sobres.id_user', 'users.id')->where('users.slug',$slug)
        ->select('meu_sobres.*','users.*')
        ->orderBy('meu_sobres.id','desc')
        ->get();
    }
}
