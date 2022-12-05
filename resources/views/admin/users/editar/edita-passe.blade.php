



@extends('layouts._includes.admin.app')

@section('titulo', 'Editar palavra-passe')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Editar palavra-passe</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">
           

                <form  action="{{ route('admin.users.atualizar.passe', $user->id) }}" method="post" class="style-1" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    @include('forms._formUser.passe')
                    <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                        <div class="text-uppercase text-increase">Editar</div>
                    </button>
                </form>

            </div>
        </div>
    </div>
    <  <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('status'))
        <script>
            Swal.fire(
                'Dados Actualizados com sucesso',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao actualizar os dados!',
                '',
                'error'
            )

        </script>
    @endif

    @if (session('passe_nao_existe'))
<script>
    Swal.fire(
        'Palavra passe actual errada!',
        '',
        'error'
    )
</script>

@endif
    
    @if (session('passe_nao_bate'))
    <script>
        Swal.fire(
            'A senha não bate com a confimação!',
            '',
            'error'
        )
    </script>
@endif



@endsection
