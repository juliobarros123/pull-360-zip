@extends('layouts._includes.admin.app')

@section('titulo', ' Adicionar tarefa')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Adicionar tarefa</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">

                @php
                    $id_user = Auth::user()->id;
                @endphp
                <form action="{{ url('tarefas/cadastrar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @include('forms._formTarefa.index')
                    </div>

                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Adicionar</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('status'))
        <script>
            Swal.fire(
                'Tarefa Cadastrada com sucesso!',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar tarefa!',
                '',
                'error'
            )
        </script>
    @endif
    <!-- Footer-->
    @if ($sim == 0)
        <script>
            Swal.fire(
                'Não poderá cadastrar a tarefa!',
                'Para cadastrar uma tarefa é necessário vincular uma disciplina a uma classe',
                'error'
            )
        </script>
    @endif

@endsection
