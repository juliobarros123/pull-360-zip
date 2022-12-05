
@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de horários de estudo')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de horários de estudo</h5>



            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('status'))
                <script>
                    Swal.fire(
                        'Horario de estudo adicionado com sucesso!',
                        '',
                        'success'
                    )

                </script>
            @endif

            <div class="custom-table table-responsive radius-top-3">
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="text-center">
                     

                           <th scope="col">ID</th>
                           <th scope="col">NÍVEL</th>
                           <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white shadow">
                        @foreach ($horarios as $horario)
                            <tr class="text-muted text-center small">
                                <th>{{ $horario->id }}</th>
                                <th>{{ $horario->vc_nivel }}</th>
                                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                    <td>
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu dropdown-menu-right table-responsive">
                                                <a href="{{ route('admin.HorarioDeEstudo.editar', $horario->id) }}"
                                                    class="dropdown-item small">Editar</a>
                                                <a href="{{ route('admin.HorarioDeEstudo.delete', $horario->id) }}" class="dropdown-item small"
                                                    data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                    {{ $horarios->onEachSide(5)->links() }}
                </div> --}}
            </div>

        </div>
        <script src="/js/datatables/jquery-3.5.1.js"></script>

        <script>
            $(document).ready(function() {

                //start delete
                $('a[data-confirm]').click(function(ev) {
                    var href = $(this).attr('href');
                    if (!$('#confirm-delete').length) {
                        $('table').append(
                            '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel">Eliminar os dados</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que pretende eliminar?</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> <a  class="btn btn-info" id="dataConfirmOk">Eliminar</a> </div></div></div></div>'
                        );
                    }
                    $('#dataConfirmOk').attr('href', href);
                    $('#confirm-delete').modal({
                        shown: true
                    });
                    return false;

                });
                //end delete
            });
        </script>
        <!-- Footer-->
    </div>

    @if (session('eliminar'))
    <script>
        Swal.fire(
            'Horario de estudo eliminado com sucesso!',
            '',
            'success'
        )

    </script>
@endif
@endsection
