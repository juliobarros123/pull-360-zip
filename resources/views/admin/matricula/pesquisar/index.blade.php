







@extends('layouts._includes.admin.app')

@section('titulo', ' Pesquisar alunos vinculados à escola ')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Pesquisar alunos vinculados à escola </h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form action="{{ url('/matricula/listar') }}" method="post" >
                    @csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="vc_anolectivo" class="form-label">Ano Lectivo:</label>
        <select name="it_id_anolectivo" id="vc_anolectivo" class="form-control bg-white rounded-pill">
            <option value="Todos">Todos</option>
            @foreach ($anoslectivos as $anolectivo)
                <option value="{{ $anolectivo->id }}">
                    {{ $anolectivo->ya_inicio . '-' . $anolectivo->ya_fim }}
                </option>
            @endforeach
        </select>

    </div>
    
                    <div class="form-group col-md-6">
                        <label for="vc_curso" class="form-label">Classe:</label>
                        <select name="id_classe" id="vc_curso" class="form-control bg-white rounded-pill">
                            <option value="Todos">Todos</option>
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}">
                                    {{ $classe->vc_classe }}ª Classe
                                </option>
                            @endforeach
                        </select>
                    </div>
    

                </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Pesquisar</div>
                        </button>
                    </div>
             
                </form>
            </div>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('status'))
        <script>
            Swal.fire(
                'Matrícula Cadastrado',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar a Matrícula!',
                '',
                'error'
            )
        </script>
    @endif

@endsection
