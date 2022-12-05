@extends('layouts._includes.admin.app')

@section('titulo', ' Lista de classes')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5"> Lista de classes</h5>

            <script src="/js/sweetalert2.all.min.js"></script>

            @if (session('status'))
                <script>
                    Swal.fire(
                        'Classe editada com Sucesso',
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
                            <th scope="col">CLASSE</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                  

                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                    {{ $classes->onEachSide(5)->links() }}
                </div> --}}
            </div>

        </div>
        <script src="/js/datatables/jquery-3.5.1.js"></script>

        <script type="text/javascript">
            var url = window.location.origin + '/classes';
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
                            data: 'id_classe',
                            name: 'id_classe'
                        },
                        {
                            data: 'vc_classe',
                            render: function(data, type, row, meta) {

                                return row.vc_classe + '.ª Classe';
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



    @if (session('eliminar'))
        <script>
            Swal.fire(
                'Classe Eliminada com sucesso!',
                '',
                'success'
            )
        </script>
    @endif


@endsection
