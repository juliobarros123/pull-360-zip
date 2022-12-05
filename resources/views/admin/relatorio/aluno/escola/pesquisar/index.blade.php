@extends('layouts._includes.admin.app')

@section('titulo', ' Relatório de alunos por escolas')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Relatório de alunos por escolas</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">

                <form action="{{ route('relatorio.aluno.escola.imprimirAlunosPorEscola') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label class="bold" for="it_id_anoLectivo">{{ __('Selecciona o ano lectivo*') }}</label>
                            <select class="form-control bg-white rounded-pill" name="it_id_anoLectivo" id="it_id_anoLectivo">



                                <option value="Todos anos" selected>Todos anos </option>


                                @foreach ($anoLectivos as $anoLectivo)
                                    <option value="{{ $anoLectivo->id }}">
                                        {{ $anoLectivo->ya_inicio }}-{{ $anoLectivo->ya_fim }}</option>
                                @endforeach


                            </select>

                        </div>


                        <div class="form-group col-sm-6">
                            <label class="bold" for="id_escola">{{ __('Selecciona a escola*') }}</label>

                            <select class="form-control bg-white rounded-pill select2" name="id_escola" id="id_escola">
                                <option value="Todas escolas" selected>Todas escolas </option>


                                @foreach ($escolas as $escola)
                                    <option value="{{ $escola->id }}">{{ $escola->vc_escola }} </option>
                                @endforeach



                            </select>

                        </div>
                    </div>

                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Ver Lista</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('teste'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Província Inexistente',
            })
        </script>
    @endif
@endsection
