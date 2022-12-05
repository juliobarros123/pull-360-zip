




@extends('layouts._includes.admin.app')

@section('titulo', 'Vincular disciplina à classe')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Vincular disciplina à classe</h5>
      
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">



                <form action="{{ url('classesDisciplinas/cadastrar')}}" method="post" >
                    @csrf
                    
              
                    @include('forms._formclasseDisciplina.index')

                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Vincular</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  <!-- sweetalert -->
  <script src="/js/sweetalert2.all.min.js"></script>

  @if (session('status'))
      <script>
          Swal.fire(
              ' disciplina vinculado!',
              '',
              'success'
          )

      </script>
  @endif
  @if (session('aviso'))
      <script>
          Swal.fire(
              'Falha ao vincular disciplina!',
              'Disciplina já deve estar vinculada! ',
              'error'
          )

      </script>
  @endif

  @if ($sim==0)
      <script>
          Swal.fire(
              'Não poderá vincular uma disciplina!',
              'Para vincular uma disciplina a uma classe é preciso cadastrar uma disciplina!',
              'error'
          )

      </script>
  @endif
  <!-- Footer-->

@endsection
