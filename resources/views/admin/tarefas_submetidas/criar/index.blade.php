@extends('layouts._includes.admin.app')

@section('titulo', 'Submeter resposta')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Submeter resposta</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">

                @php
                    $id_user = Auth::user()->id;
                @endphp
                <form action="{{ url("$id/$id_user/Tarefas_Submetidas/cadastrar") }}" method="post" 
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @include('forms._formTarefaSubmeter.index')
                    </div>

                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Submeter</div>
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
                'Tarefa a Submeter Cadastrado',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar Tarefa a Submeter!',
                '',
                'error'
            )
        </script>
    @endif
    <!-- Footer-->

@endsection
