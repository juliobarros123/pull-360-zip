<?php

namespace App\Imports;

use App\Models\DependenciaProfessor;
use Maatwebsite\Excel\Concerns\ToModel;

class DependenciaProfessorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
       $existe= DependenciaProfessor::where('it_numero_agente',$row[1])->orWhere('vc_BI',$row[3])->count();
       
       if(!$existe && !empty($row[3]) ){
        //    dd($row);
           $provincia=$row[0];
           $numero_agente=(int)$row[1];
           $nome_professor=$row[2];
           $BI=$row[3];

           
        return new DependenciaProfessor([
            'vc_provincia'=> $provincia,
            'it_numero_agente'=> $numero_agente,
            'vc_professor'=> $nome_professor,
            'vc_BI'=> $BI,
        ]);

    }
    }
}
