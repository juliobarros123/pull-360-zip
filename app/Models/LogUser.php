<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LogUser extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $fillable = [
        'it_idUser',
        'vc_descricao',
    ];

    public  function LogsForSearch($anoLectivo, $id_user)
    {

        $response['logs'] =DB::table('logs')
        ->join('users', 'users.id', '=', 'logs.it_idUser')
        ->select('logs.*','users.vc_primemiroNome','users.id as id_user','users.vc_apelido')
        ->whereYear('logs.created_at', '=', $anoLectivo)
        ->where([
            ['users.id', '=', $id_user]
          ])
         ;
          if ($anoLectivo == 'Todos' && $id_user == 'Todos') {
            $response['logs'] =DB::table('logs')
        ->join('users', 'users.id', '=', 'logs.it_idUser')
        ->select('logs.*','users.vc_primemiroNome','users.id as id_user','users.vc_apelido');
        }else if($anoLectivo == 'Todos' && $id_user )
        {
            
        $response['logs'] =DB::table('logs')
        ->join('users', 'users.id', '=', 'logs.it_idUser')
        ->select('logs.*','users.vc_primemiroNome','users.id as id_user','users.vc_apelido')
        ->where([
            ['users.id', '=', $id_user]
          ]);
        }else if($id_user == 'Todos' && $anoLectivo )
        {
            $response['logs'] =DB::table('logs')
            ->join('users', 'users.id', '=', 'logs.it_idUser')
            ->select('logs.*','users.vc_primemiroNome','users.id as id_user','users.vc_apelido')
            ->whereYear('logs.created_at', '=', $anoLectivo);
        }

        return  $response['logs']->get();
    }
}
