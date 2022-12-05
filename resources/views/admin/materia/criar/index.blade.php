




@extends('layouts._includes.admin.app')

@section('titulo', ' Adicionar conteúdo')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Adicionar conteúdo</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
                
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">
               
                <div class="card-text text-info text-center"> <i>Ajustar a classe e as disciplinas nos campos "Horário*" e "Classe e disciplina*</i> </div>
               <form action="{{ url('materia/cadastrar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('forms._formMateria.index')
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Adicionar</div>
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
              'Falha ao cadastrar conteúdo!',
              'A classe disciplina deve ser igual a classe disciplina do horário ',
              'error'
          )
      </script>
  @endif

  @if ($sim == 0)
      <script>
          Swal.fire(
              'Não poderá cadastrar conteúdo!',
              'Para cadastrar uma conteúdo é necessário vincular uma disciplina a uma classe e cadastrar um horário!',
              'error'
          )
      </script>
  @endif

  <!-- Footer-->


@endsection
