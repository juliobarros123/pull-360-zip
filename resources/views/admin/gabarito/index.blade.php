@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de gabaritos')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de gabaritos</h5>



            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('status'))
                <script>
                    Swal.fire(
                        'Horario de Estudo cadastrado com sucesso!',
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
                            <th scope="col">TEMA</th>
                            <th scope="col">GABARITO</th>

                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white shadow">
                        @foreach ($gabaritos as $gabarito)
                            <tr class="text-muted text-center small">
                                <td>{{ $gabarito->id }}</td>

                                <td>{{ $gabarito->vc_descricao_gabarito }}</td>
                                <td><a href="{!! url('storage/' . $gabarito->vc_gabarito) !!}" target="_blank" class=" "><img
                                            src="{{ url('site/img/pdf-24.png') }}" alt="">
                                        PDF</a></td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu dropdown-menu-right table-responsive">
                                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo'|| Auth::User()->vc_tipoUtilizador == 'Professor')
                                                <a href="{{ route('gabarito.editar', $gabarito->id) }}"
                                                    class="dropdown-item small">Editar</a>
                                            @endif

                                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Professor')
                                                <a href="{{ route('gabarito.delete', $gabarito->id) }}"
                                                    class="dropdown-item small"
                                                    data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
                                            @endif
                                        </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                    {{ $gabaritos->onEachSide(5)->links() }}
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
                'Horario de Estudo Eliminado com sucesso!',
                '',
                'success'
            )
        </script>
    @endif
@endsection
