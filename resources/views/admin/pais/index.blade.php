



@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de Encarregados')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de encarregados</h5>

            <div class="custom-table table-responsive radius-top-3">
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">FOTO</th>
                            <th scope="col">E-MAIL</th>
                            <th scope="col">Nº TELEFONE</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                   

                </table>
                <script type="text/javascript">
                    var url = window.location.origin + '/pais?1';
            
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
                                    data: 'nome_completo',
                                    render: function(data, type, row, meta) {
                                        return row.vc_primemiroNome + ' ' + row.vc_apelido;
            
                                    }
                                },
            
                                {
                                    data: 'profile_photo_path',
                                    render: function(data, type, row, meta) {
                                        console.log(row.profile_photo_path);
                                        return '<img src="/storage/' + row.profile_photo_path + '" alt="' + row
                                            .vc_primemiroNome + ' ' + row.vc_apelido +
                                            '" width="40" style="border-radius:2px">'
                                    }
                                },
            
            
                                {
                                    data: 'vc_email',
                                    render: function(data, type, row, meta) {
                                        return row.vc_email;
            
                                    }
                                },
                                {
                                    data: 'vc_telefone',
                                    render: function(data, type, row, meta) {
                                        return row.vc_telefone;
            
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
    </div>

    <script>
        $(document).ready(function() {
     
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
    
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('eliminado'))
            <script>
                Swal.fire(
                    'Encarregado Eliminado com Sucesso!',
                    '',
                    'success'
                )
            </script>
        @endif




@endsection
