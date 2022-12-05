@extends('layouts._includes.admin.app')

@section('titulo', 'Editar tema')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Editar tema</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form form action="{{ route('unidades.actualizar', $unidade->id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    @include('forms._formUnidade.index')
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Editar</div>
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
                'unidade actualizada com Sucesso!',
                '',
                'success'
            )
        </script>
    @endif

    @if (session('has'))
        <script>
            Swal.fire(
                'Falha ao actualizar unidade!',
                'unidade já existe',
                'error'
            )
        </script>
    @endif

    <!-- Footer-->


@endsection
