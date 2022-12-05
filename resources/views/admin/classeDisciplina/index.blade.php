




@extends('layouts._includes.admin.app')

@section('titulo', ' Lista de classes e disciplinas')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5"> Lista de classes e disciplinas</h5>

            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('status'))
                <script>
                    Swal.fire(
                        'Disciplina vinculada com sucesso',
                        '',
                        'success'
                    )

                </script>
            @endif


            @if (session('up'))
                <script>
                    Swal.fire(
                        'Disciplina editada com sucesso',
                        '',
                        'success'
                    )

                </script>
            @endif
            <div class="custom-table table-responsive radius-top-3">
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="">
                             <th scope="">ID</th>
                             <th scope="">CLASSE</th>
                             <th scope="">DISCIPLINA</th>
                             <th scope="">ACÇÕES</th>
                        </tr>
                    </thead>
               

                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                    {{ $classesDiscilpnas->onEachSide(5)->links() }}
                </div> --}}
            </div>

        </div>


        <script type="text/javascript">
            var url = window.location.origin + '/classesDisciplinas/{{ $id_classe }}/classeDisciplinas';
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
                            data: 'id_c_d',
                            name: 'id_c_d'
                        },
                        {
                            data: 'vc_classe',
                            render: function(data, type, row, meta) {

                                return row.vc_classe + '.ª Classe';
                            }
                        },
                        {
                            data: 'vc_disciplina',
                            name: 'vc_disciplina'
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



    @if (session('eliminar'))
        <script>
            Swal.fire(
                'Vínculo eliminado com sucesso!',
                '',
                'success'
            )
        </script>
    @endif
@endsection
