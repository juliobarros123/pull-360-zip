@extends('layouts._includes.admin.app')

@section('titulo', ' Lista de tarefas')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5"> Lista de tarefas</h5>

            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('status'))
                <script>
                    Swal.fire(
                        'Matéria editada com sucesso!',
                        '',
                        'success'
                    )
                </script>
            @endif

            @if (session('eliminar'))
                <script>
                    Swal.fire(
                        'Matéria eliminada com sucesso!',
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
                            <th scope="col">TÍTULO</th>
                            <th scope="col">DESCRIÇÃO</th>
                            <th scope="col">DATA DE ENTREGA</th>

                            <th scope="col">CLASSE E DISCIPLINA</th>
                            <th scope="col">DOCUMENTO</th>
                            <th scope="col">IMAGEM ILUSTRATIVA</th>
                            {{-- <th scope="col">GABARITO</th> --}}
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>


                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                    {{ $tarefas->onEachSide(5)->links() }}
                </div> --}}
            </div>

        </div>

    </div>

    <script type="text/javascript">
        var url = window.location.origin + '/alunos/{{ $it_id_classeDisciplina }}/minhaTarefa';
        
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
                        data: 'id_tarefa',
                        name: 'id_tarefa'
                    },
                    {
                        data: 'vc_tarefa',
                        name: 'vc_tarefa'
                    },
                    {
                        data: 'vc_descricao',
                        name: 'vc_descricao'
                    },
                    {
                        data: 'dt_data_entrega',
                        name: 'dt_data_entrega'
                    },
                    {
                        data: 'classe_disciplina',
                        render: function(data, type, row, meta) {


                            return row.vc_classe + ".ª Classe/" + row.vc_disciplina;

                        }
                    },
                    {
                        data: 'vc_pdf',
                        render: function(data, type, row, meta) {
                            if (row.vc_pdf) {
                                return '<a href="/storage/' + row.vc_pdf + '" target="_blank">VISUALIZAR</a>';
                            } else {
                                return 'SEM DOCUMENTO';
                            }



                        }
                    },
                    {
                        data:'vc_img',
                        render: function(data, type, row, meta) {
                            if (row.vc_img) {
                                return '<a target="_blank" href="/storage/' + row.vc_img + '">VISUALIZAR</a>';
                            } else {
                                return 'SEM IMAGEM';
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
                    // acoes();
                }
            })


            ;




        });
    </script>

    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('status'))
        <script>
            Swal.fire(
                'Tarefa cadastrada com sucesso',
                '',
                'success'
            )
        </script>
    @endif


    @if (session('eliminar'))
        <script>
            Swal.fire(
                'Tarefa eliminada com sucesso',
                '',
                'success'
            )
        </script>
    @endif


    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('actualizar'))
        <script>
            Swal.fire(
                'Tarefa actualizada com sucesso',
                '',
                'success'
            )
        </script>
    @endif



@endsection
