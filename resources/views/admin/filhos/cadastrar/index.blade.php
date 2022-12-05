@extends('layouts._includes.admin.app')

@section('titulo', 'Cadastrar Utilizador')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h5>Cadastrar Utilizador</h5>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('teste'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Funcionário Inexistente',
            })
        </script>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/users/salvar') }}" method="post" class="row" enctype="multipart/form-data">
                @csrf

                @include('forms._formUser.index.blade.php')

                <div class=" col-md-12 text-center d-flex justify-content-center ">
                    <button  id="cabotao"  type="submit" class=" col-md-2 text-center btn btn-dark"> Cadastrar</button>
                </div>
                {{-- <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('status'))
        <script>
            Swal.fire(
                'Utilizador Cadastrado com sucesso!',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar Utilizador!',
                'Email existente ou senhas diferentes ou mesmo nome de usuário existente',
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
