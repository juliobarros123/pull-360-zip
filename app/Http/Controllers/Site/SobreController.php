<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeuSobre;
use Illuminate\Support\Facades\Auth;

class SobreController extends Controller
{
    //
    protected $meu_sobre;
    public function __construct(MeuSobre $meu_sobre)
    {
     
        $this->meu_sobre = $meu_sobre;
    }
    public function index($slug)
    {
        // dd($slug);
        $response['meu_sobre'] =  $this->meu_sobre->meu_sobre($slug);
        $response['meu_sobre'] = MeuSobre::join()
        ->where('id_user', Auth::User()->id)->orderBy('id', 'desc')->first();
        return view('site.timeline.sobre.index', $response);
    }
}
