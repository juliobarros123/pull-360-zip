@extends('layouts._includes.merge.painel')
@section('titulo', 'Home')

 @section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h5>Relatório de Alunos por Município </h5>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/alunos/receberecebeMunicipio') }}" class="row" method="POST">
                @csrf
                <div class="form-group col-md-6">
                    <label for="vc_anolectivo" class="form-label">Ano Lectivo:</label>
                    <select name="vc_anolectivo" id="vc_anolectivo" class="form-control" required>
                        <option value="Todos">Todos</option>
                        @foreach ($anoslectivos as $anolectivo)
                            <option value="{{ $anolectivo->id }}">
                                {{ $anolectivo->ya_inicio . '-' . $anolectivo->ya_fim }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label for="vc_municipio" class="form-label">Município:</label>
                    <select name="vc_municipio" id="vc_municipio" class="form-control" required>
                        <option value="Todos">Todos</option>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio->it_id_minicipio}}">
                                {{ $municipio->it_id_minicipio}}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class=" col-md-12 text-center d-flex justify-content-center ">
            <button type="submit" class="btn btn-dark" > Pesquisar
                </button>
                </div>

            </form>
        </div>
    </div>




    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Alguma coisa deu errado',
        })
    </script>
@endif
            


@endsection


