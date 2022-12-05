





@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de escolas')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de escolas</h5>

            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('status'))
                <script>
                    Swal.fire(
                        'Escola editada com sucesso!',
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
                            <th scope="col">LOGO</th>
                            <th scope="col">NOME</th>
                            <th scope="col">NIF</th>
                            <th scope="col">DIRECTOR</th>
                            <th scope="col">E-MAIL</th>
                            <th scope="col">DATA DE REGISTRO</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                    

                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                    {{ $escolas->onEachSide(5)->links() }}
                </div> --}}
            </div>

        </div>

        <script src="/js/datatables/jquery-3.5.1.js"></script>
 <script type="text/javascript">
    var url = window.location.origin + '/escolas';

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
                    data: 'vc_logo',
                    render: function(data, type, row, meta) {
                    
                        return '<img src="/storage/' + row.vc_logo + '" alt="' + row
                            .vc_escola + 
                            '" width="40" style="border-radius:2px">'
                    }
                },
                {
                    data: 'vc_escola',
                    render: function(data, type, row, meta) {
                        return row.vc_escola;

                    }
                },
                {
                    data: 'vc_num_ide',
                    render: function(data, type, row, meta) {
                        return row.vc_num_ide;

                    }
                },

                {
                    data: 'vc_director',
                    render: function(data, type, row, meta) {
                        return row.vc_director;

                    }
                }
                ,

                {
                    data: 'vc_email',
                    render: function(data, type, row, meta) {
                        return row.vc_email;

                    }
                },
                {
                    data: 'dt_data_registro',
                    render: function(data, type, row, meta) {
                        return row.dt_data_registro;

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

    </div>
</div>

@if (session('eliminar'))
    <script>
        Swal.fire(
            'Escola Eliminada com sucesso!',
            '',
            'success'
        )

    </script>
@endif

@endsection
