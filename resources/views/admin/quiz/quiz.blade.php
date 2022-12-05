@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Quiz')])

@section('content')
  <div class="content">
    <div class="container-fluid">
   
       <div class="card">
       <div class="card-body">

       <div class="card bg-primary">
               <h1 class="card-text">{{$afirmacoes['0']->tema_aulas}}</h1>
              </div>

               <div class="card bg-info">
               <p class="card-text display-4 text-center">{{$afirmacoes['0']->descriacao_perguntas}}</p>
               </div>
             
 
              
             @foreach($afirmacoes as $afirmacao)

               <div class="card">
                 
               <a href="{{route('quizzes.verificarResposta',['id_afirmacao'=>$afirmacao->id,'id_pergunta_quizzes'=>$afirmacao->id_pergunta_quizzes])}}" class="btn btn-link card-body">
               <p class="card-text"> {{$afirmacao->descricao_respostas}}  </p>
                     </a>
               </div>
               @endforeach


      
              
</div>
</div>
        
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush