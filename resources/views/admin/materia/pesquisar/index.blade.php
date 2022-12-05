


@extends('layouts._includes.admin.app')

@section('titulo', ' Pesquisar conteúdo')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Pesquisar conteúdo</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form action="{{ url('/materia/listarMateria/') }}" method="post" class="style-1"
                    enctype="multipart/form-data">
                    @csrf
<div class="row">
                    <div class="form-group col-md-6">
                        <label for="vc_anolectivo" class="bold">Selecciona o ano lectivo:</label>
                        <select name="id_anoLectivo" id="vc_anolectivo" class="form-control bg-white rounded-pill" required>
                            <option value="" disabled selected>Ano lectivo:</option>
                            @foreach ($anoslectivos as $anolectivo)
                                <option value="{{ $anolectivo->id }}">
                                    {{ $anolectivo->ya_inicio . '-' . $anolectivo->ya_fim }}
                                </option>
                            @endforeach
                        </select>
    
                    </div>
    
                    <div class="form-group col-md-6 ">
                        <label for="it_id_classeDisciplina" class="bold">{{ __('Selecciona a classe e a disciplina') }}</label>
                        <select class="form-control bg-white rounded-pill select2" name="it_id_classeDisciplina" id="it_id_classeDisciplina" required>
    
                            <option value="" disabled selected>Classe e disciplina</option>
                            @foreach ($classesDisciplinas as $classeDisciplina)
                                <option value="{{ $classeDisciplina->id_c_d }}">
                                    {{ $classeDisciplina->vc_classe }}ª Classe|{{ $classeDisciplina->vc_disciplina }}</option>
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
