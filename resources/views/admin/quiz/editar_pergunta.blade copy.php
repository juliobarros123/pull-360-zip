@extends('layouts._includes.admin.app')

@section('titulo', 'Cadastrar Pergunta')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h3>Editar Pergunta</h3>
        </div>
    </div>
    <br>

    <div class="card">
        <div class="card-body">

            <form action="{{ url("quizzes/$pergunta->id/actualizar_pergunta") }}" enctype="multipart/form-data"
                method="POST">
                @method('put')

                @csrf

                <div class="form-group">
                    <label for="descricao_perguntas">Pergunta:</label>
                    <textarea rows="6" cols="20" class="form-control"
                        name="descricao_perguntas">{{ $pergunta->descricao_perguntas }}</textarea>
                </div>





                @isset($afirmacoes['0'])
                    <div class="form-group col-md-12 row">

                        <div class="row col-sm-12">
                            <label for="afirmacao1" class="col-md-12">Afirmação 1:</label>
                            <input class="form-control col-sm-2" type="text" name="id_afirmacao1"
                                value="{{ $afirmacoes['0']->id }}" readonly>
                            <input class=" ml-1 form-control col-sm-9" type="text" placeholder="Título do tema"
                                name="afirmacao1" value="{{ $afirmacoes['0']->descricao_respostas }}">
                        </div>
                    </div>

                @endisset


                @isset($afirmacoes['1'])



                    <div class="form-group col-md-12 row">

                        <div class="row col-sm-12">
                            <label for="afirmacao2" class="col-md-12">Afirmação 2:</label>
                            <input class="form-control col-sm-2" type="text" name="id_afirmacao2"
                                value="{{ $afirmacoes['1']->id }}" readonly>
                            <input class=" ml-1 form-control col-sm-9" type="text" placeholder="Título do tema"
                                name="afirmacao2" value="{{ $afirmacoes['1']->descricao_respostas }}">
                        </div>
                    </div>

                @endisset

                @isset($afirmacoes['2'])
                    <div class="form-group col-md-12 row">

                        <div class="row col-sm-12">
                            <label for="afirmacao3" class="col-md-12">Afirmação 3:</label>
                            <input class="form-control col-sm-2" type="text" name="id_afirmacao3"
                                value="{{ $afirmacoes['2']->id }}" readonly>
                            <input class=" ml-1 form-control col-sm-9" type="text" placeholder="Título do tema"
                                name="afirmacao3" value="{{ $afirmacoes['2']->descricao_respostas }}">
                        </div>
                    </div>
                @endisset



                @isset($afirmacoes['3'])
                    <div class="form-group col-md-12 row">

                        <div class="row col-sm-12">
                            <label for="afirmacao4" class="col-md-12">Afirmação 4:</label>
                            <input class="form-control col-sm-2" type="text" name="id_afirmacao4"
                                value="{{ $afirmacoes['3']->id }}" readonly>
                            <input class=" ml-1 form-control col-sm-9" type="text" placeholder="Título do tema"
                                name="afirmacao4" value="{{ $afirmacoes['3']->descricao_respostas }}">
                        </div>
                    </div>
                @endisset

                <div class="form-group">
                    <label for="afirmacoa_correta">Selecione a afirmação correcta:</label>
                    <select class="form-control" name="afirmacoa_correta">
                        @isset($resposta->id_afirmacao_pergunta_quizzes)

                            @isset($afirmacoes['0']->id)
                                @if ($afirmacoes['0']->id == $resposta->id_afirmacao_pergunta_quizzes)
                                    <option value="1" selected>Afirmação 1</option>
                                @endif
                            @endisset
                            @isset($afirmacoes['1']->id)
                                @if ($afirmacoes['1']->id == $resposta->id_afirmacao_pergunta_quizzes)
                                    <option value="2" selected>Afirmação 2</option>
                                @endif

                            @endisset

                            @isset($afirmacoes['2']->id)
                                @if ($afirmacoes['2']->id == $resposta->id_afirmacao_pergunta_quizzes)
                                    <option value="3" selected>Afirmação 3</option>
                                @endif
                            @endisset

                            @isset($afirmacoes['3']->id)
                                @if ($afirmacoes['3']->id == $resposta->id_afirmacao_pergunta_quizzes)
                                    <option value="4" selected>Afirmação 4</option>
                                @endif
                            @endisset
                        @endisset

                        <option value="1">Afirmação 1</option>
                        <option value="2">Afirmação 2</option>
                        <option value="3">Afirmação 3</option>
                        <option value="4">Afirmação 4</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="afirmacoa_correta">Tempo Limite(hh:mm)</label>
                    <input type="time" name="time" class="form-control">
                </div>


        </div>
    </div>
    <div class="col-md-12 py-1  text-center  d-flex justify-content-center">
        <input type="submit" class="col-md-2 btn btn-dark" value="Criar">
    </div>
    </form>


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
