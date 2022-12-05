@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de utilizadores')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de utilizadores</h5>


            <div class="table-responsive">
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="">
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">FOTOGRAFIA</th>
                            <th scope="col">E-MAIL</th>
                            <th scope="col">Nº TELEFONE</th>
                            <th scope="col">TIPO DE UTILIZADOR</th>
                            <th scope="col">ACÇÃO</th>
                        </tr>
                    </thead>

                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                {{ $users->onEachSide(5)->links() }}
             </div> --}}
            </div>

        </div>
    </div>


    <script type="text/javascript">
        var url = window.location.origin + '/admin/users/listar';

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
                        data: 'tipoUtilizador',
                        name: 'tipoUtilizador'
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
                    $(".selectTipoUtilizador").on("change", function() {
                        var id = $(this).attr('id');
                        let id_int = parseInt(id);
                        let perfil =$(this).val();
                    
                        $.ajax({
                            type: 'GET',
                            url: `/admin/users/${id_int}/verPerfil`,
                            success: function(data) {
                             
                                if (perfil) {
                                    $.ajax({
                                        type: 'POST',
                                        dataType: 'json',
                                        url: `mudarPerfil/perfil/${id}/${perfil}`,
                                        contentType: "application/json",
                                        headers: {
                                            'X-CSRF-TOKEN': $(
                                                'meta[name="csrf-token"]'
                                                ).attr('content')
                                        },

                                        async: true,
                                        success: function(response) {
                                            console.log(response)
                                            Swal.fire(
                                                'Perfil Actualizado com sucesso',
                                                '',
                                                'success'
                                            );
                                        }

                                    })

                                }
                            }
                        });
                    });



                }

            })


            ;




        });
    </script>


    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('eliminado'))
        <script>
            Swal.fire(
                'Utilizador Eliminado com Sucesso!',
                '',
                'success'
            )
        </script>
    @endif


    @if (session('editado'))
        <script>
            Swal.fire(
                'Utilizador Editado com Sucesso!',
                '',
                'success'
            )
        </script>
    @endif

    <script>

        
    </script>



@endsection
