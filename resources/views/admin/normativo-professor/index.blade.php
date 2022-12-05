@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de documentos ')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de documentos </h5>

            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('eliminar'))
                <script>
                    Swal.fire(
                        'Documentos nidade Eliminada com Sucesso',
                        '',
                        'success'
                    )
                </script>
            @endif

            @if (session('status'))
                <script>
                    Swal.fire(
                        'Documentos Editada com Sucesso',
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
                                 <th scope="col">DOCUMENTO</th>
                            <th scope="col">DATA DE PUBLICAÇÃO</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                    
                </table>

{{-- 
                <div class="d-flex justify-content-end p-3">
                    {{ $unidades->onEachSide(5)->links() }}
                </div> --}}
            </div>

        </div>
        <script type="text/javascript">
            var url = window.location.origin + '/normativos-professor';
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
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'vc_normativo',
                            name: 'vc_normativo'
                        },
                        {
                            data: 'vc_descricao',
                            name: 'vc_descricao'
                        },
                        
                        {
                            data: 'vc_caminho',
                            render: function(data, type, row, meta) {
    
                                return '<a href="/storage/' + row.vc_caminho + '">Visualizar</a>'
                            }
                        },
                        
                        {
                            data: 'dt_data_publicao',
                            name: 'dt_data_publicao'
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
        <!-- Footer-->
    </div>



@endsection
