@extends('layouts._includes.admin.app')

@section('titulo', 'INSERIR DADOS ESCOLARES')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                INSERIR DADOS ESCOLARES
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ url('/matricula/cadastrar') }}" method="post" class="row">
                @csrf

                @include('forms._formMatricula.index')

                <div class=" col-md-12 text-center d-flex justify-content-center ">
                    <button type="submit" class=" col-md-2 text-center btn btn-dark"> Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('status'))
        <script>
            Swal.fire(
                'Matrícula Cadastrada com sucesso!',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar a Matrícula!',
                'O aluno já existe neste ou faltou inserir um dado inerete ao cadastro!',
                'error'
            )

        </script>
    @endif

    @if ($sim==0)
        <script>
            Swal.fire(
                'Não poderá cadastrar a Matrícula!',
                'Para matricular alguém é preciso cadastrar um educando, classe, ano lectivo e uma escola!',
                'error'
            )

        </script>
    @endif




@endsection
