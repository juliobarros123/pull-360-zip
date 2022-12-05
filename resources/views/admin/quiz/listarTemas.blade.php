
@extends('layouts._includes.admin.app')

@section('titulo', 'Matérias disponiveis')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h3>Matérias disponiveis</h3>
        </div>
    </div>

<br>    
    <div class="card"> 
        <div class="card-body ">
     
       <div class="col-md-12 py-1  text-center  d-flex justify-content-center">
        <div class="list-group col-md-12">
            <a href="#" class="list-group-item list-group-item-action active">
                {{$disciplina->vc_disciplina}}
            </a>
            @foreach($temas as $tema)
            <a href="{{route('quizzes.criarPeguntas',['id_tema'=>$tema->id])}}" class="list-group-item list-group-item-action"> {{$tema->vc_materia}}</a>
           @endforeach
          </div>
    </div>
              
</div>
</div>
        
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
