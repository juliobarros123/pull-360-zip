@extends('layouts._includes.admin.app')

@section('titulo', ' Relatório de Alunos por Província')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Relatório de Alunos por Província</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">

                <form action="{{ route('listar_alunos_provincia') }}" method="post">
                    @csrf
                    @include('forms._formQuantidadeAlunoPorProvincia.index')

                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Ver Lista</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('teste'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Província Inexistente',
            })
        </script>
    @endif
@endsection
