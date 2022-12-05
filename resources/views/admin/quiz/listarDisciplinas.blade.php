@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
    <ul>
    <li>
       <div class="card-title">
       <div class="card-text">Escolhe a Disciplina</div>
       </div>
              <ul>
                    @foreach($disciplinas as $disciplina)
                    <li>
                     <a href="{{route('quizzes.escolherTemaDeQuiz',['id_disciplina'=>$disciplina->id])}}" class="btn btn-link" style="text-decoration:none!important">
                     {{$disciplina->nome_disciplinas}}
                     </a>
                   </li>
                    @endforeach
       
              </ul>
       </li>

     
  
      </ul>
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