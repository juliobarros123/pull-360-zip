

@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de perguntas')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de perguntas</h5>



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
                              <th scope="col">PERGUNTA</th>
                              <th scope="col">NÍVEL</th>
                              <th scope="col">CLASSE</th>
                              <th scope="col">DISCIPLINA</th>
                              <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                 
                </table>
                <script type="text/javascript">
   
                    var url = window.location.origin + '/quizzes/questoes';
                 
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
                                    data: 'questao',
                                    render: function(data, type, row, meta) {
                                        return row.questao;
            
                                    }
                                },
                                {
                                    data: 'nivel',
                                    render: function(data, type, row, meta) {
                                        return row.nivel;
            
                                    }
                                },
                                {
                                    data: 'vc_classe',
                                    render: function(data, type, row, meta) {
                                        return row.vc_classe+'.ª Classe';
            
                                    }
                                },
                                {
                                    data: 'vc_disciplina',
                                    render: function(data, type, row, meta) {
                                        return row.vc_disciplina;
            
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
