@extends('layouts._includes.admin.app')

@section('titulo', ' Adicionar horário de estudo')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Adicionar horário de estudo</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('teste'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Classe Inexistente',
                    })
                </script>
            @endif
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form action="{{ route('admin.HorarioDeEstudo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @include('forms._formHorarioDeEstudo.index')
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
                'Horário de Estudo Cadastrado',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar Horário de Estudo!',
                'error'
            )
        </script>
    @endif

@endsection
