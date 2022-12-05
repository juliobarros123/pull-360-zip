@extends('layouts._includes.admin.app')

@section('titulo', 'Cadastrar Pergunta')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h3>Cadastrar Pergunta</h3>
        </div>
    </div>
<br>

    <div class="card">
        <div class="card-body">

            <form action="{{ url("quizzes/$tema->id/cadastrar") }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="descricao_perguntas">Pergunta:</label>
                    <textarea rows="6" cols="20" class="form-control" name="descricao_perguntas">
               </textarea>
                </div>

                <div class="form-group">
                    <label for="afirmacao1">Afirmação 1:</label>
                    <input class="form-control" type="text" placeholder="Título do tema" name="afirmacao1">
                </div>


                <div class="form-group">
                    <label for="afirmacao2">Afirmação 2:</label>
                    <input class="form-control" type="text" placeholder="Título do tema" name="afirmacao2">
                </div>

                <div class="form-group">
                    <label for="afirmacao3">Afirmação 3:</label>
                    <input class="form-control" type="text" placeholder="Título do tema" name="afirmacao3">
                </div>

                <div class="form-group">
                    <label for="afirmacao4">Afirmação 4:</label>
                    <input class="form-control" type="text" placeholder="Título do tema" name="afirmacao4">
                </div>


                <div class="form-group">
                    <label for="afirmacoa_correta">Selecione a afirmação correcta:</label>
                    <select class="form-control" name="afirmacoa_correta">
                        <option desabled>Escolhe a afirmação</option>
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
