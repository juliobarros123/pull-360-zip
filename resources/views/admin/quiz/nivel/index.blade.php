
@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de niveis ')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de niveis </h5>



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
                             <th scope="col">NÍVEL</th>
                            
                             <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                  

                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                    {{ $niveis->onEachSide(5)->links() }}
                </div> --}}
            </div>

        </div>
        


        <script type="text/javascript">
            var url = window.location.origin + '/quizzes/niveis';
       
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
                            data: 'nivel',
                            name: 'nivel'
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
@if (session('up'))
    <script>
        Swal.fire(
            'Dados Actualizados com sucesso',
            '',
            'success'
        )

    </script>
@endif

@if (session('status'))
<script>
    Swal.fire(
        'Dados Actualizados com sucesso',
        '',
        'success'
    )
</script>
@endif
@endsection
