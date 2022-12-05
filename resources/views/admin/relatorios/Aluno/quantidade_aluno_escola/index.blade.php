@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de Alunos por Escola')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5"> Lista de Alunos por Escola <br> Escola: {{ $it_id_escolaLista }} <br> Ano Lectivo:
                {{ $it_id_anoLectivoLista }}.</h5>



            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('status'))
                <script>
                    Swal.fire(
                        'Dados Actualizados com sucesso',
                        '',
                        'success'
                    )
                </script>
            @endif

            <div class="custom-table table-responsive radius-top-3">

                <div class="form-group col-md-2">
                    <a href="{{ route('imprimir_alunos_escola', [$it_id_anoLectivo,$it_id_escola,$it_id_anoLectivoLista,$it_id_escolaLista]) }}"
                        class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto">Gerar Pdf</a>
                </div>
                <table class="table mb-0">
                    <thead class="table-blue small">
                        <tr class="text-center">
                            <th scope="col">ESCOLA</th>
                            <th scope="col">QUANTIDADE</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white shadow">

                        @foreach ($escolas as $escola)
                            <tr class="text-muted text-center small">
                                <td>NÃO MATRICULADOS</td>
                                <td>{{ $nao_matriculados }}</td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="d-flex justify-content-end p-3">
                    {{ $escolas->onEachSide(5)->links() }}
                </div>
            </div>

        </div>

    @endsection
