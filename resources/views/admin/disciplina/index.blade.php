
@extends('layouts._includes.admin.app')

@section('titulo', ' Lista de disciplinas')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5"> Lista de disciplinas</h5>

            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('eliminar'))
                <script>
                    Swal.fire(
                        'Disciplina eliminada com Sucesso',
                        '',
                        'success'
                    )
 
                </script>
            @endif

            @if (session('status'))
                <script>
                    Swal.fire(
                        'Disciplina editada com Sucesso',
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
                            <th scope="col">DISCIPLINA</th>
                            <th scope="col">FOTOGRAFIA</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                  
                </table>
               
            </div>

        </div>
        <script src="/js/datatables/jquery-3.5.1.js"></script>
        <script type="text/javascript">
            var url = window.location.origin + '/disciplinas';

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
                            data: 'vc_disciplina',
                            render: function(data, type, row, meta) {

                                return row.vc_disciplina;
                            }
                        },
                        {
                            data: 'vc_imagem',
                            render: function(data, type, row, meta) {
                          
                               
                                    return '<img src="/storage/' +  row.vc_imagem + '" alt="' +  row.vc_disciplina +
                                        '" width="40" style="border-radius:2px">';
                              
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

      
        <!-- Footer-->
    </div>



@endsection
