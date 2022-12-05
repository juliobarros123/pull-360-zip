









@extends('layouts._includes.admin.app')

@section('titulo', '   Editar conteúdo')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>   Editar conteúdo</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
                
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">
               
                <div class="card-text text-info text-center"> <i>Ajustar a classe e as disciplinas nos campos "Horário*" e "Classe e disciplina*</i> </div>
                    <form action="{{ route('materia.actualizar', $materia->id) }}" method="post" >
                        @csrf
                        @method('put')
                @include('forms._formMateria.index')
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Editar</div>
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
              'Conteúdo Cadastrada com sucesso!',
              '',
              'success'
          )
      </script>
  @endif
  @if (session('aviso'))
      <script>
          Swal.fire(
              'Falha ao cadastrar Conteúdo!',
              'A classe disciplina deve ser igual a classe disciplina do horário ',
              'error'
          )
      </script>
  @endif

  <!-- Footer-->


@endsection
