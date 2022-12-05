


@extends('layouts._includes.admin.app')

@section('titulo', ' Cadastrar Escola')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Cadastrar Escola</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form form action="{{ route('escolas.actualizar',['id'=>$escola->id,'id_user'=>Auth::User()->id]) }}" method="post"  enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    @include('forms._formEscola.index')
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
              'Usuário Cadastrado',
              '',
              'success'
          )

      </script>
  @endif
  @if (session('aviso'))
      <script>
          Swal.fire(
              'Falha ao cadastrar usuário!',
              'Email existente ou senhas diferentes ',
              'error'
          )

      </script>
  @endif

@endsection
