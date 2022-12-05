@extends('layouts._includes.admin.app')

@section('titulo', 'Home')

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <h2 class="h5 page-title">
                Painel do Ambiente Virtual de Ensino Angolano
            </h2>
        </div>
    </div>
    @if (Auth::User()->vc_tipoUtilizador == 'Administrador')
    <div class="row">
        <div class="col-md-3 my-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title">Total de utilizadores</strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                    class="text-muted">{{  $ttl_users}}</span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinebar"><canvas width="40" height="32"
                                    style="display: inline-block; width: 40px; height: 32px; vertical-align: top;"></canvas></span>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
        <div class="col-md-3 my-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title">Total de professores</strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                    class="text-muted">{{  $ttl_professores}}</span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinepie"><canvas width="32" height="32"
                                    style="display: inline-block; width: 32px; height: 32px; vertical-align: top;"></canvas></span>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
        <div class="col-md-3 my-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title">Total de Educandos</strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-down text-danger"></span><span
                                    class="text-muted">{{$ttl_filhos}}</span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlineline"><canvas width="100" height="32"
                                    style="display: inline-block; width: 100.297px; height: 32px; vertical-align: top;"></canvas></span>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
        <div class="col-md-3 my-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <strong class="card-title">Total de encarregados</strong>
                            <p class="small mb-0"><span class="fe fe-12 fe-arrow-up text-success"></span><span
                                    class="text-muted">{{  $ttl_encarregados}}</span></p>
                        </div>
                        <div class="col-4 text-right">
                            <span class="sparkline inlinepie"><canvas width="32" height="32"
                                    style="display: inline-block; width: 32px; height: 32px; vertical-align: top;"></canvas></span>
                        </div>
                    </div> <!-- /. row -->
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->


    </div>
    @endif

    {{-- graficos --}}
    @if (Auth::User()->vc_tipoUtilizador == 'Administrador')
    <div class="row">

        <div class="col-md-6 mb-2">
            <div class="card shadow">
                <div class="card-header">
                    <strong class="card-title mb-0">Alunos por Província</strong>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>

                    <div id="chart1" style="height: 300px;"></div>
                    <!-- Charting library -->
                    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                    <!-- Chartisan -->
                    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
                    <!-- Your application script -->
                    <script>
                        const chart1 = new Chartisan({
                            el: '#chart1',
                            url: "@chart('Aluno')",
                            hooks: new ChartisanHooks()
                                .colors(['#4299E1', '#FE0045', '#C07EF1', '#67C560', '#ECC94B', '#A299F1', '#42CCE1', '#FETT45',
                                    'purple', 'green', 'maroon', 'wheat', 'pea', 'golden', 'yellow', 'coral', 'khaki', 'lime'
                                ])
                                .datasets('pie')
                                .axis(false)
                        });
                    </script>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <strong class="card-title mb-0">Alunos por Classe</strong>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <!-- Chart's container -->
                    <div id="chart" style="height: 300px;"></div>
                    <!-- Charting library -->
                    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                    <!-- Chartisan -->
                    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
                    <!-- Your application script -->
                    <script>
                        const chart = new Chartisan({
                            el: '#chart',
                            url: "@chart('my_chart')",
                            hooks: new ChartisanHooks()
                                .colors(['#4299E1', '#FE0045', '#C07EF1', '#67C560', '#ECC94B'])
                                .datasets('bar')
                                .axis(true)
                        });
                    </script>
                </div> <!-- /.card-body-->
            </div> <!-- /.card-->
        </div>
    </div>
@endif


@if (Auth::User()->vc_tipoUtilizador == 'Filho')
  <div class="row mt-4">
    <div class="col-md-12 bg-white ">
<div class="row">

    <div class="col-md-6 bg-secundary p-5 mx-auto">
        <div class="shadow-sm p-4">
                <h3 class="text-center">Seja Bem-Vindo </h3>

            <div class="p-4">
                <p>Que bom ter você de Volta!</p>
                <p >Pronto para mais uma jornada de Aprendizado ? </p>

            </div>
        </div>

    </div>
    <div class="col-md-6">
        <img src="{{asset('site/capa.jpg')}}" class="img-fluid" alt="" width="100%">
    </div>



</div>



  </div>


  <div class="col-md-12 bg-white mt-3 p-2 ">

<div class="p-3">
    <h5 class="">Matérias Recentes... </h5>

</div>

        <hr>
       <div class="container-fluid">
        <div class="row">
            @foreach ($materias as $materia )

                <div class="col-md-3">

                        <div class="card p-4 ">

                            <div class="card-body">
                                <h5>{{$materia->vc_disciplina}}</h5>
                                {{--<small style="text-align: right" class="text-right">Publicado a 2 minutos ...</small>  --}}

                                <hr>
                                <p><b>Unidade: {{ $materia->vc_unidade }}</b> </p>
                                <h6 class="text-primary"><a href="{{url('/materia/aluno/ver/'.$materia->id.'/'.$materia->it_id_unidadeMateria.'/')}}">{{ $materia->vc_materia}} </a> </h6>

                            </div>
                        </div>
                </div>

                @endforeach

        </div>

       </div>


</div>
</div>
@endif




@endsection
