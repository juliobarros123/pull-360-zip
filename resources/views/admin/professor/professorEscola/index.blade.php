@extends('layouts._includes.admin.app')
@section('titulo', 'Lista de Professores | Escola')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de Professores | Escola</h5>
        
            <div class="custom-table table-responsive radius-top-3">
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="text-center">
                      
                            <th scope="col">ID</th>
                            <th scope="col">PROFESSOR</th>
                            <th scope="col">ESCOLA</th>
                            <th scope="col">CLASSE</th>
                            <th scope="col">DISCIPLINA</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
              

                </table>
              
            </div>

        </div>
    </div>

    <script type="text/javascript">
   
        var url = window.location.origin + '/professores/escola';
     
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

                            return row.id_fun_escola;
                        }
                    },
                    {
                        data: 'nome_completo',
                        render: function(data, type, row, meta) {
                            return row.vc_primemiroNome + ' ' + row.vc_apelido;

                        }
                    },
                    {
                        data: 'vc_escola',
                        render: function(data, type, row, meta) {
                            return row.vc_escola;

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

  

<script src="/js/sweetalert2.all.min.js"></script>
@if (session('delete'))
    <script>
        Swal.fire(
            'Dados apagado com sucesso',
            '',
            'success'
        )
    </script>
@endif






@endsection
