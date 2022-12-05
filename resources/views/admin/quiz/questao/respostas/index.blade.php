@extends('layouts._includes.admin.app')

@section('titulo', 'Respotas')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Opções de resposta a pergunta:

                <strong>{{ $questao->questao }}</strong>
            </h5>



            <!-- sweetalert -->
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
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="">

                            <th scope="col">ID</th>
                            <th scope="col">RESPOTA</th>
                            <th>Estado</th>
                            <th scope="col">ACÇÕES</th>

                        </tr>
                    </thead>

                </table>

            </div>

        </div>


        <script type="text/javascript">
            var url = window.location.origin + '/quizzes/questoes/respostas/{{ $slug }}';

            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                   $('#dataTable').DataTable({
                 "draw": 1,
                "recordsTotal": 57,
                "recordsFiltered": 57,
                "dom": '<lf<"custom-table table-responsive radius-top-3"t>ip>',

                processing: true,

                processing: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: url,
                        type: "GET"


                    },
                    columns: [{
                            data: 'id',
                            render: function(data, type, row, meta) {

                                return row.id;
                            }
                        },
                        {
                            data: 'resposta',
                            render: function(data, type, row, meta) {
                                var resposta = row.resposta;

                                if (resposta.split('/')[2] == 'file') {
                                    return '<img src="/storage/' + resposta + '" alt="' + resposta +
                                        '" width="40" style="border-radius:2px">';
                                } else {
                                    return resposta;
                                }
                            }
                        },
                        {
                            data: 'estado',
                            render: function(data, type, row, meta) {
                                if (row.estado == 1) {
                                    return "Certa";
                                } else {
                                    return "Errada";
                                }


                            }
                        },


                        {
                            data: 'dropdownAction',
                            name: 'dropdownAction',
                            orderable: false
                        },

                    ],
                    order: [
                        [0, 'desc']
                    ],
                    "fnDrawCallback": function() {
                        dataConfirmDelete();



                    }

                })


                ;




            });
        </script>

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

        <!-- sweetalert -->
        <script src="/js/sweetalert2.all.min.js"></script>
        @if (session('up'))
            <script>
                Swal.fire(
                    'Dados Actualizados com sucesso',
                    '',
                    'success'
                )
            </script>
        @endif

    @endsection
