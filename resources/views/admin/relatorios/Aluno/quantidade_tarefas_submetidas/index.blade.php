


@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de Tarefas Submetidas')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">  Lista de Tarefas Submetidas <br> Ano Lectivo: {{$it_id_anoLectivoLista}}.</h5>



            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('status'))
                <script>
                    Swal.fire(
                        'Dados Actualizados com sucesso',
                        '',
                        'success'
                    )
          
                </script>
            @endif

            <div class="custom-table table-responsive radius-top-3">
         
                <div class="form-group col-md-2">
                    <a href="{{route('imprimir_tarefas_submetidas',[$it_id_anoLectivo,$it_id_classesDiciplina,$it_id_anoLectivoLista])}}" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto">Gerar Pdf</a>
                </div>
                <table class="table mb-0">
                    <thead class="table-blue small">
                        <tr class="text-center">


                            <th scope="col">TAREFA</th>
                            <th scope="col">CLASSE</th>
                            <th scope="col">DISCIPLINA</th>                  
                            <th scope="col">QUANTIDADE</th> 

                        </tr>
                    </thead>
                    <tbody class="bg-white shadow">

                        @foreach ($tarefas as $tarefa)
                            <tr class="text-muted text-center small">
                                <th>{{$tarefa->vc_tarefa}}</th>
                                <th>{{$tarefa->vc_classe}}ª Classe</th>
                                <th>{{$tarefa->vc_disciplina}}</th>
                                <th>{{$tarefa->quantidade}}</th>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="d-flex justify-content-end p-3">
                    {{ $tarefas->onEachSide(5)->links() }}
                </div>
            </div>

        </div>

    @endsection
