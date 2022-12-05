@extends('layouts._includes.admin.app')

@section('titulo', ' Adicionar horário')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Adicionar horário</h5>
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


                <form action="{{ url('/horarios/cadastrar') }}" method="post">
                    @csrf

                    @include('forms._formHorario.index')
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Adicionar</div>
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
                'Horário Cadastrado com Sucesso!',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao adicionar horário!',
                '',
                'error'
            )
        </script>
    @endif

    @if ($sim == 0)
        <script>
            Swal.fire(
                'Não poderá adicionar horário!',
                'Para adicionar um horário é necessário vincular uma disciplina a uma classe e adicionar um ano lectivo!',
                'error'
            )
        </script>
    @endif

    @if (session('has'))
        <script>
            Swal.fire(
                'Falha ao adicionar horário!',
                'Horário existente',
                'error'
            )
        </script>
    @endif
    <!-- Footer-->
@endsection
