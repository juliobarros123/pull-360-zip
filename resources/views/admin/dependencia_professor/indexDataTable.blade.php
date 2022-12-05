<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 DataTable Ajax Books CRUD Example</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <div class="container mt-4">

        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewBook" class="btn btn-success">Add</button></div>

        <div class="card">

            <div class="card-header text-center font-weight-bold">
                <h2>Laravel 8 Ajax Book CRUD with DataTable Example Tutorial</h2>
            </div>

            <div class="card-body">

                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="">


                            <th scope="col">PROFESSOR</th>
                            <th scope="col">PROVÍNCIA</th>

                            <th scope="col">NÚMERO DE BILHETE DE IDENTIDADE</th>
                            <th scope="col">NÚMERO DE AGENTE</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>

                </table>


            </div>

        </div>

        <script type="text/javascript">
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
                    ajax: "{{ url('dependencias/professor') }}",
                    columns: [{
                            data: 'vc_professor',
                            name: 'vc_professor'
                        },
                        {
                            data: 'vc_provincia',
                            name: 'vc_provincia'
                        },
                        {
                            data: 'vc_BI',
                            name: 'vc_BI'
                        },
                        {
                            data: 'it_numero_agente',
                            name: 'it_numero_agente'
                        },


                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        },
                    ],
                    order: [
                        [0, 'desc']
                    ]
                })


                ;






            });
        </script>

        {{-- <script>
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
        </script> --}}
    </div>
</body>

<script src="/js/sweetalert2.all.min.js"></script>
