@extends('layouts._includes.admin.app')

@section('titulo', 'Adicionar pergunta')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Adicionar pergunta</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form action="{{ url('quizzes/questoes/cadastrar') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    @include('forms._form_quiz._form_questao.index')
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
                'Pergunta cadastrada com sucesso',
                '',
                'success'
            )
        </script>
    @endif


    @if (session('error'))
        <script>
            Swal.fire(
                'Erro',
                'O tempo deve ser maior ou igual que 00:01',
                'error'
            )
        </script>
    @endif
@endsection
