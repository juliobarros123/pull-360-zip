@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de horários')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de horários</h5>



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
                        <tr class="">
                            <th scope="col">ID</th>
                            <th scope="col">CLASSE</th>
                            <th scope="col">DISCIPLINA</th>
                            <th scope="col">DIA NA SEMANA</th>
                            <th scope="col">DURAÇÃO</th>
                            <th scope="col">ANO LECTIVO</th>
                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                <th>ACÇÕES</th>
                            @endif
                        </tr>
                    </thead>
                   

                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                    {{ $horarios->onEachSide(5)->links() }}
                </div> --}}
            </div>

        </div>
        <script type="text/javascript">
            var url = window.location.origin + '/horarios';
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
                            data: 'id_horarios',
                            name: 'id_horarios'
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
                        }, {
                            data: 'vc_dia',
                            name: 'vc_dia'
                        }, {
                            data: 'intervalo',
                            render: function(data, type, row, meta) {

                                return row.vc_hora_inicio + '/'+row.vc_hora_fim;
                            }
                        },{
                            data: 'anoLectivo',
                            render: function(data, type, row, meta) {

                                return row.ya_inicio + '/'+row.ya_fim;
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
                        // acoes();
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
                'Horário Eliminado com sucesso!',
                '',
                'success'
            )
        </script>
    @endif
@endsection
