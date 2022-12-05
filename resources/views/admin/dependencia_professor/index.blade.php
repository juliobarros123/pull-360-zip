@extends('layouts._includes.admin.app')

@section('titulo', ' Lista de agentes')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de agente de educação e ensino</h5>

            <div class="custom-table  radius-top-3">
                <table class="table mb-0 " id="dataTable">
                    <thead class="table-blue small">
                        <tr class="">


                            <th scope="col" class="d">PROFESSOR</th>
                            <th scope="col">PROVÍNCIA</th>
                            <th scope="col">NÚMERO DE BILHETE DE IDENTIDADE</th>
                            <th scope="col">NÚMERO DE AGENTE</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>

                </table>


            </div>

        </div>

        <script type="text/javascript">
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
                    ajax: "{{ url('dependencias/professor') }}",
                    columns: [{
                            data: 'vc_professor',
                            name: 'vc_professor'
                        },
                        {
                            data: 'vc_provincia',
                            name: 'vc_provincia'
                        },
                        {
                            data: 'vc_BI',
                            name: 'vc_BI'
                        },
                        {
                            data: 'it_numero_agente',
                            name: 'it_numero_agente'
                        },


                        {
                            data: 'action',
                            name: 'action'

                        },
                    ],
                    order: [
                        [1, 'desc']
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
      
        <script></script>
        @if (session('status'))
            <script>
                Swal.fire(
                    'Agentes cadastrados com sucesso',
                    '',
                    'success'
                )
            </script>
        @endif

        @if (session('eliminado'))
            <script>
                Swal.fire(
                    'Agente eliminado com sucesso!',
                    '',
                    'success'
                )
            </script>
        @endif
        @if (session('actualizada'))
            <script>
                Swal.fire(
                    'Agente actualizado com sucesso!',
                    '',
                    'success'
                )
            </script>
        @endif




    @endsection
