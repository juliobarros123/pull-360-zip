@extends('layouts._includes.admin.app')

@section('titulo', ' Total de Alunos por Município')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5"> Total de Alunos por Município</h5>



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
                    <a href="{{ route('admin.visualizar.pdf', [$data, $data1]) }}"
                        class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto">Gerar Pdf</a>
                </div>
                <table class="table mb-0">
                    <thead class="table-blue small">
                        <tr class="text-center">


                            <th scope="col">Nº</th>
                            <th scope="col">MUNICÍPIO</th>
                            <th scope="col">TOTAL DE ALUNOS</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white shadow">

                        @foreach ($totalGeral as $total)
                        <?php $contador = 1; ?>
                            <tr class="text-muted text-center small">

                                <td><?php echo $contador++; ?></td>
                                <td><?php echo $total->m; ?></td>
                                <td><?php echo $total->total; ?></td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="d-flex justify-content-end p-3">
                    {{ $totalGeral->onEachSide(5)->links() }}
                </div>
            </div>

        </div>

    @endsection
