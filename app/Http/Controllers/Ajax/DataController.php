<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use Illuminate\Support\Facades\DB;
class DataController extends Controller
{
    //
    public function classes(){
        $classes  =DB::table("classes")->where('it_estado',1)
        ->pluck("classes.vc_classe","classes.id");
        return response()->json($classes);
    }
}
