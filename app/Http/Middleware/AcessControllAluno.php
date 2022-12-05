<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AcessControllAluno {
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */

    public function handle( Request $request, Closure $next ) {
        if ( auth()->user()->vc_tipoUtilizador == 'Encarregado' ) {
            return redirect()->route( 'home' );
        } else if ( auth()->user()->vc_tipoUtilizador == 'Professor' ) {
            return redirect()->route( 'home' );
        } else {
            return $next( $request );
        }
    }
}
