

@extends('layouts._includes.admin.app')

@section('titulo', ' Adicionar Ano Lectivo')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Adicionar ano lectivo</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">



                <form action="{{ route('admin/anolectivo/cadastrar') }}" method="post">
                    @csrf
              
                        @include('forms._formAnoLectivo.index')
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

    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao adicionar o Ano lectivo !',
                '',
                'error'
            )
        </script>
    @endif

    @if (session('status'))
        <script>
            Swal.fire(
                'Ano Lectivo adicionar com Sucesso!',
                '',
                'success'
            )
        </script>
    @endif

    @if (session('aviso'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro ao adicionar Ano Lectivo',
            })
        </script>
    @endif
@endsection
