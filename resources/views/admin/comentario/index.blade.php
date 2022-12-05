@extends('layouts._includes.admin.app')

@section('titulo', 'Comentários')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Comentários</h5>

            <script src="/js/sweetalert2.all.min.js"></script>


            <div class="custom-table table-responsive radius-top-3">
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="">


                            <th scope="col">ID</th>
                            <th scope="col">UTILIZADOR</th>
                            <th scope="col">TIPO DE UTILIZADOR</th>
                            <th scope="col">COMENTÁRIO</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>


                </table>
              




                <script type="text/javascript">
                    var url = window.location.origin + '/admin/comentarios';
                    console.log(url);
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
                                type: "GET",

                            },
                            columns: [{
                                    data: 'id_comentario',
                                    name: 'id_comentario'
                                },
                                {
                                    data: 'nome_completo',
                                    render: function(data, type, row, meta) {
                                        return row.vc_primemiroNome + ' ' + row.vc_apelido;

                                    }
                                },
                                {
                                    data: 'vc_tipoUtilizador',
                                    name: 'vc_tipoUtilizador'
                                },
                                {
                                    data: 'tdComentario',
                                    name: 'tdComentario'
                                },
                                {
                                    data: 'tdEstado',
                                    name: 'tdEstado'
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
                                // acoes();
                            }
                        })


                        ;




                    });
                </script>
            </div>

        </div>

    </div>
    </div>



@endsection
