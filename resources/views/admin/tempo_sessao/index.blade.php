






        @extends('layouts._includes.admin.app')

        @section('titulo', 'Lista de durações da sessão')

        @section('conteudo')
            <div class="page-wrapper p-2 p-md-5">
                <div class="p-3">
                    <h5 class="mb-5">Lista de durações da sessão</h5>



                    <script src="/js/sweetalert2.all.min.js"></script>
                    @if (session('status'))
                        <script>
                            Swal.fire(
                                'Horário editado com sucesso!',
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
                                    <th scope="col">TEMPO DE CONTAGEM </th>
                                    <th scope="col">TEMPO DE TÉRMINO</th>
                                    <th scope="col">ACÇÕES</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white shadow">
                                @foreach ($tempos_sessao as $tempo_sessao)
                                    <tr class="text-muted text-center small">
                                        <th>{{ $tempo_sessao->id }}</th>
                                        <th>{{ $tempo_sessao->tempo_contagem }}</th>
                                        <th>{{ $tempo_sessao->tempo_termino }}</th>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"></button>
                                                <div class="dropdown-menu dropdown-menu-right table-responsive">
                                                    @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                                        <a href="{{ route('tempo_sessao.editar', ['id' => $tempo_sessao->id]) }}"
                                                            class="dropdown-item small">editar</a>



                                                        <a href="{{ route('tempo_sessao.eliminar', $tempo_sessao->id) }}"
                                                            class="dropdown-item small"
                                                            data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        {{-- <div class="d-flex justify-content-end p-3">
                            {{ $tempos_sessao->onEachSide(5)->links() }}
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


            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('up'))
                <script>
                    Swal.fire(
                        'Tempo editado com sucesso!',
                        '',
                        'success'
                    )
                </script>
            @endif

            @if (session('status'))
                <script>
                    Swal.fire(
                        'Tempo adicionado com sucesso!',
                        '',
                        'success'
                    )
                </script>
            @endif
            @if (session('delete'))
                <script>
                    Swal.fire(
                        'Tempo eliminado com sucesso!',
                        '',
                        'success'
                    )
                </script>
            @endif
        @endsection
