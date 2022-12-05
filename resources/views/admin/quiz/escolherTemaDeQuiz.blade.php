@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
    <ul>
    <li>
       <div class="card-title">
       <div class="card-text">{{$disciplina->nome_disciplinas}}</div>
       </div>
              <ul>
                    @foreach($temas as $tema)
                    <li>
                     <a href="{{route('quizzes.iniciarJogo',['id_tema'=>$tema->id])}}" class="btn btn-link">
                     {{$tema->tema_aulas}}
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