@extends('layouts._includes.admin.app')

@section('titulo', ' Editar dados académicos do Educando ')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Editar dados académicos do Educando </h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form form action="{{ route('matricula.update', $matriculas->id) }}" method="post">
                    @method('put')
                    @csrf
                    @include('forms._formMatricula.index')


            </div>
            <div class="py-3">
                <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                    <div class="text-uppercase text-increase">Editar</div>
                </button>
            </div>

            </form>
        </div>
    </div>

    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('teste'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Dados Académicos do Educando Inexistente',
            })
        </script>
    @endif

    @if (session('status'))
        <script>
            Swal.fire(
                'Dados Académicos do Educando Editada com Sucesso!',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao Editar a Dados Académicos do Educando!',
                '',
                'error'
            )
        </script>
    @endif

@endsection
