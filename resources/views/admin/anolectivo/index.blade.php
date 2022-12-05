@extends('layouts._includes.admin.app')

@section('titulo', ' Lista de Anos Lectivos')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5"> Lista de anos lectivos</h5>

            <script src="/js/sweetalert2.all.min.js"></script>

            @if (session('status'))
                <script>
                    Swal.fire(
                        'Ano Lectivo editado com sucesso',
                        '',
                        'success'
                    )
                </script>
            @endif

            <div class="custom-table table-responsive radius-top-3">
                <table class="table mb-0 " id="dataTable">
                    <thead class="table-blue rounded  small">
                        <tr class="">




                            <th scope="col">ID</th>
                            <th scope="col">INICIO</th>
                            <th scope="col">FIM</th>
                            
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                    

                </table>
              
              
            </div>

        </div>
        <script type="text/javascript">
            var url = window.location.origin + '/admin/anolectivo';
       
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
                            data: 'ya_inicio',
                            name: 'ya_inicio'
                        },
                        {
                            data: 'ya_fim',
                            name: 'ya_fim'
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
    
    </div>


    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('eliminar'))
        <script>
            Swal.fire(
                'Ano Lectivo Eliminado com Sucesso!',
                '',
                'success'
            )
        </script>
    @endif

    @if (session('ano_corrente'))
        <script>
            Swal.fire(
                'Ano Lectivo Corrente defenido com Sucesso!',
                '',
                'success'
            )
        </script>
    @endif

@endsection
