@extends('layouts._includes.admin.app')

@section('titulo', 'Registro de actividades')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Registo de actividades</h5>
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
            <div class="custom-table  radius-top-3">
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="text-center">
                            {{-- <th scope="col">ID</th> --}}
                            <th scope="col">DATA</th>
                            <th scope="col">UTILIZADOR</th>
                            <th scope="col">ACTIVIDADE</th>

                        </tr>
                    </thead>
                    {{-- <tbody class="bg-white shadow">
                        @foreach ($logs as $log)
                            <tr class="text-muted text-center small">
                                <td>{{ $log->id }}</td>
                                <td>{{ $log->created_at }}</td>
                                <td>{{ $log->vc_primemiroNome . '  ' . $log->vc_apelido }}</td>
                                <td>{{ $log->vc_descricao }}</td>
    
                               
                            </tr>
                        @endforeach

                    </tbody> --}}

                </table>

            </div>

        </div>
        {{-- $anoLectivo;
        $response['utilizador'] = $utilizador; --}}
        <script type="text/javascript">
            var url = window.location.origin + '/admin/logs/visualizar/index/{{ $anoLectivo }}/{{ $utilizador }}';
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
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'vc_primemiroNome',
                            render: function(data, type, row, meta) {
                           
                                return row.vc_primemiroNome+''+row.vc_apelido;
                            }
                        },
                        {
                            data: 'vc_descricao',
                            name: 'vc_descricao'
                        },
                        // {
                        //     data: 'discricao',
                        //     name: 'discricao'
                        // },


                        // {
                        //     data: 'opcoes',
                        //     name: 'opcoes',
                        //     orderable: false
                        // },
                    ],
                    order: [
                        [0, 'desc']
                    ]
                })


                ;




            });
        </script>

    @endsection
