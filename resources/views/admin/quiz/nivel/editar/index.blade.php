



@extends('layouts._includes.admin.app')

@section('titulo', 'Editar nivel')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Editar nível</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form action="{{ route('quizzes.niveis.actualizar',$nivel->slug) }}" enctype="multipart/form-data"
                    method="POST">
                    @method('put')
    
                    @csrf

                    @include('forms._form_quiz._form_nivel.index')
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
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('up'))
        <script>
            Swal.fire(
                'Dados Actualizados com sucesso',
                '',
                'success'
            )
    
        </script>
    @endif
@endsection
