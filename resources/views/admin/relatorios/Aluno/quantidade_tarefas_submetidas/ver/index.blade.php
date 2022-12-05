@extends('layouts._includes.admin.app')

@section('titulo', 'Relatório de Tarefas Submetidas')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Relatório de Tarefas Submetidas</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">
                <form action="{{ route('listar_tarefas_submetidas') }}" method="post">
                    @csrf

                    @include('forms._formQuantidadeTarefaSubmetida.index')

                    <div class="py-3">
                        <button href="{{ route('listar_alunos_classe', [1, 1]) }}" type="submit"
                            class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase"> Ver Lista</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- sweetalert -->




    <!-- Footer-->
@endsection
