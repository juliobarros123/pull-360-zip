@extends('layouts._includes.admin.app')
@section('titulo', ' Lista de Conteúdo')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5"> Lista de conteúdos</h5>

            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('status'))
                <script>
                    Swal.fire(
                        'Conteúdo editado com sucesso!',
                        '',
                        'success'
                    )
                </script>
            @endif

            @if (session('eliminar'))
                <script>
                    Swal.fire(
                        'Conteúdo eliminada com sucesso!',
                        '',
                        'success'
                    )
                </script>
            @endif

            <div class="custom-table  radius-top-3">
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="">
                            <th scope="col">ID</th>
                            <th scope="col">TÍTULO</th>
                            <th scope="col">CLASSE</th>
                            <th scope="col">DISCIPLINA</th>
                            <th scope="col">HORÁRIO</th>
                            <th scope="col">TEMA</th>

                            <th scope="col">DATA DE REGISTO</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                    {{-- <tbody class="bg-white shadow">
                        @foreach ($materias as $materia)
                            <tr class="text-muted text-center small">
                                <td>{{ $materia->id_m }}</td>
                                <td>{{ $materia->vc_materia }}</td>
                                <td>{{ $materia->vc_classe }}ª Classe</td>
                                <td>{{ $materia->vc_disciplina }}</td>
                                <td>{{ $materia->vc_classe }}ª
                                    Classe|{{ $materia->vc_disciplina }}|{{ $materia->vc_dia }}|({{ $materia->vc_hora_inicio }}-{{ $materia->vc_hora_fim }})
                                    | ({{ $materia->ya_inicio }}/{{ $materia->ya_fim }})</td>
                                <td>{{ $materia->vc_unidade }}</td>
                                <td>{{ $materia->dt_data_vizualizar }}</td>


                                <td>
                                  
                                </td>
                            </tr>
                        @endforeach

                    </tbody> --}}

                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                            {{ $materias->onEachSide(5)->links() }}
                        </div> --}}
            </div>

        </div>

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
    </div>

    <script type="text/javascript">
        var url = window.location.origin + '/materia/listarMateria2/{{ $it_id_classeDisciplina }}/{{ $id_anoLectivo }}';
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
                        data: 'id_m',
                        name: 'id_m'
                    },
                    {
                        data: 'vc_materia',
                        name: 'vc_materia'
                    },
                    {
                        data: 'vc_classe',
                        render: function(data, type, row, meta) {

                            return row.vc_classe + ".ª Classe";
                        }
                    },
                    {
                        data: 'vc_disciplina',
                        name: 'vc_disciplina'
                    }, {
                        data: 'horario',
                        render: function(data, type, row, meta) {


                            return row.vc_classe + ".ª Classe/" + row.vc_disciplina + "/" + row
                                .vc_dia + "/" + row.vc_hora_inicio + "/" + row.vc_hora_fim;

                        }
                    },
                    {
                        data: 'vc_unidade',
                        name: 'vc_unidade'
                    },
                    {
                        data: 'dt_data_vizualizar',
                        name: 'dt_data_vizualizar'
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



@endsection
