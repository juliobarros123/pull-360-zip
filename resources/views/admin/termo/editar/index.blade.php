

@extends('layouts._includes.admin.app')

@section('titulo', 'Editar termo')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Editar termo
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form form action="{{ route('termos.actualizar', $termo->id) }}" method="post" class="row" enctype="multipart/form-data">
                @method('put')
                @csrf
                @include('forms._formTermo.index')

                <div class=" col-md-12 text-center d-flex justify-content-center ">
                    <button type="submit" class=" col-md-2 text-center btn btn-dark"> Confirmar</button>
                </div>
            </form>

        </div>
    </div>
    <!-- sweetalert -->
    <script src="/js/sweetalert2.all.min.js"></script>


    @if (session('status'))
        <script>
            Swal.fire(
                'termo actualizada com Sucesso!',
                '',
                'success'
            )

        </script>
    @endif
   
    @if (session('has'))
        <script>
            Swal.fire(
                'Falha ao actualizar termo!',
                'termo já existe',
                'error'
            )

        </script>
    @endif
   
    <!-- Footer-->

@endsection
