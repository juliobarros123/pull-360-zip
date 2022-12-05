

@extends('layouts._includes.admin.app')

@section('titulo', 'Disciplinas Disponiveis')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h3>Disciplinas Disponiveis</h3>
        </div>
    </div>
<br>
    <div class="card">
        <div class="card-body">
         
               
            <div class=" col-md-12 text-center d-flex justify-content-center ">
                            

                            <div class="row">
                                @foreach($disciplinas as $disciplina)
                    
                                    <div class="card col-sm-3  m-1 ">
                                        <div class="card-body">
                                            <div class="card-text text-center"><a href="{{route('quizzes.materias',['id_disciplina'=>$disciplina->id])}}" class="btn btn-link" style="text-decoration:none!important">
                                                {{$disciplina->vc_disciplina}}
                                                </a></div>
                                        </div>
                                    </div>
                    
                                @endforeach
                            </div>
            </div>
        </div>
    </div>

    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('up'))
        <script>
            Swal.fire(
                'Dados Actualizados com sucesso',
                '',
                'success'
            )

        </script>
    @endif

    

@endsection
