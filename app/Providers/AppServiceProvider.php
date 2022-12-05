<?php

namespace App\Providers;

use App\Models\Cabecalho;
use App\Models\Escola;
use App\Models\TempoSessao;
use App\Models\UnidadeMateria;
use App\Models\User;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Models\Area;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
      
        view()->composer('*', function ($view) {
            $areas=Area::all();
            $view->with('areas', $areas);
        });
      
        $charts->register([
            \App\Charts\AlunoClasseChart::class,
            \App\Charts\AlunosPorProvincia::class,
        ]);
        Paginator::useBootstrap();

    }
}
