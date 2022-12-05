@extends('layouts._includes.admin.app')

@section('titulo', 'Editar Educando')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h5>Editar dados do educando</h5>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <form form action="{{ route('filhos.atualizar', $user->id) }}" method="post" class="row" enctype="multipart/form-data">
                @method('put')
                @csrf
                @include('site.forms._formUser.index')
                <div class="col-md-12 py-1  text-center  d-flex justify-content-center">
                    <input id="cabotao" type="submit" class="col-md-2 btn btn-dark" value="Confirmar alterações">
                </div>
            </form>
        </div>
    </div>
    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('editado'))
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
    
    @if (session('error'))
    <script>
        Swal.fire(
            'Falha ao cadastrar Utilizador!',
            'Não carregou a foto de Utilizador ou email já está sendo utilizado!',
            'error'
        )
    </script>
@endif

@endsection
