

@extends('layouts._includes.admin.app')

@section('titulo', 'Editar pergunta')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Editar pergunta</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form action="{{ route('quizzes.questoes.actualizar',$questao->slug_questao) }}" enctype="multipart/form-data"
                    method="POST">
                    @method('put')
    
                    @csrf
    
    
    
                    @include('forms._form_quiz._form_questao.index') 
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
    @if (session('error'))
        <script>
            Swal.fire(
                'Erro',
                'O tempo deve ser maior ou igual que 00:01',
                'error'
            )
        </script>
    @endif

    @if (session('status'))
    <script>
        Swal.fire(
            'Pergunta actualizada com sucesso',
            '',
            'success'
        )
    </script>
@endif

@endsection
