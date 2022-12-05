
@extends('layouts._includes.admin.app')

@section('titulo', 'Cadastrar termo')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Cadastrar termo
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ url('termos/cadastrar')}}" method="post" class="row" >
                @csrf

                @include('forms._formTermo.index')

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
                'Termo Cadastrada com Sucesso!',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar Termo!',
                '',
                'error'
            )

        </script>
    @endif

    @if (session('has'))
        <script>
            Swal.fire(
                'Falha ao cadastrar Termo!',
                'termo já existe',
                'error'
            )

        </script>
    @endif
   
    <!-- Footer-->

@endsection
