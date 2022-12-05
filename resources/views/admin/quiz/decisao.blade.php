@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Quiz')])

@section('content')
  <div class="content">
    <div class="container-fluid">
   
       <div class="card">
       <div class="card-body">

    @if($estado==true)
               <div class="card bg-success">
               <h1 class="crad-text"> Certo!</h1>
               </div>
               @endif

               @if($estado==false)
               <div class="card bg-danger">
               <h1 class="card-text"> Errado!</h1>
               </div>
               @endif


               @if($id_proximaPergunta!='')
               <div class="row">
                 <div class="col-sm-4"></div>
               <div class="card bg-success w-25 col-sm-3">

               <a href="{{route('quizzes.proximaPergunta',['id_proximaPergunta'=>$id_proximaPergunta])}}" class="btn btn-link bg-success card-body" >
                    <p class="card-text text-dark">Seguinte</p> 
                     </a>
               </div>
              </div>
               @endif

               @if($id_proximaPergunta=='')
               <div class="card bg-success">
               <h1 class="card-text"> Final  </h1>
               </div>
               @endif
            
                     


      
              
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