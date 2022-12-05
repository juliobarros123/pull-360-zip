@extends('layouts._includes.admin.app')

@section('titulo', 'Educandos')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Educandos</h5>

            <div class="custom-table table-responsive  radius-top-3">
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">FOTOGRAFIA</th>
                            {{-- <th scope="col">Email</th>
                        <th scope="col">Nº telefone</th> --}}
                            <th scope="col">TIPO DE UTILIZADOR</th>
                            <th scope="col">ESCOLA</th>
                            <th scope="col">CLASSE</th>
                            <th scope="col">ANO LECTIVO</th>
                            <th scope="col">Acção</th>
                        </tr>
                    </thead>


                </table>

            </div>

        </div>
    </div>


    <script type="text/javascript">
        var url = window.location.origin + '/educandos';
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
                        data: 'vc_tipoUtilizador',
                        render: function(data, type, row, meta) {
                            console.log(row.profile_photo_path);
                            return '<img src="storage/' + row.profile_photo_path + '" alt="' + row
                                .vc_primemiroNome + ' ' + row.vc_apelido +
                                '" width="40" style="border-radius:2px">'
                        }
                    },

                    {
                        data: 'vc_tipoUtilizador',
                        render: function(data, type, row, meta) {
                            return row.vc_tipoUtilizador;

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
                            console.log(row.id_matricula);
                            return '<select  class="form-control border-0 classesSelect" ' +
                                'idUser="' + row.id + '" idMatricula="' + row.id_matricula +
                                '"  id="selectClasse' + row.id + '">' +
                                '<option value="Director Geral">' + row.vc_classe +
                                '.ª Classe</option></select>'
                        }
                    },
                    {
                        data: 'anoLectivo',
                        render: function(data, type, row, meta) {
                            return row.ya_inicio + "/" + row.ya_fim;
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
                    $('.classesSelect').on("click", function() {
                        var select = $(this);
                        var idSelectClasses = select.attr("id");
                        console.log(idSelectClasses);
                        $.ajax({
                            type: "GET",
                            dataType: 'json',
                            url: 'ajax/classes',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            async: true,

                            success: function(response) {

                                if ($('#' + idSelectClasses + ' option').length ==
                                    '1') {
                                    $.each(response, function(id, vc_classe) {

                                        $('#' + idSelectClasses)
                                            .append(
                                                '<option value="' + id +
                                                '">' +
                                                vc_classe +
                                                '.ª Classe</option>'
                                            )

                                    });
                                    // console.log()
                                }

                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });

                    });

                    $(".classesSelect").on("change", function() {
                        var id_matricula = $(this).attr('idMatricula');
                        console.log(id_matricula);
                        var classe = $(this).val();

                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: `/matricula/mudarClasse/classe/${id_matricula}/${classe}`,
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
                                    'Classe Actualizada com sucesso',
                                    '',
                                    'success'
                                );
                            }
                        })

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

    @if (session('status'))
        <script>
            Swal.fire(
                'Dados Actualizados com sucesso',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('eliminado'))
        <script>
            Swal.fire(
                'Educando eliminado com sucesso!',
                '',
                'success'
            )
        </script>
    @endif

    @if (session('status'))
        <script>
            Swal.fire(
                'Matéria editada com sucesso!',
                '',
                'success'
            )
        </script>
    @endif

    @if (session('eliminar'))
        <script>
            Swal.fire(
                'Vinculo  eliminado com sucesso!',
                '',
                'success'
            )
        </script>
    @endif
    <script>
        $("classesSelect").on("change", function() {
            var id = $(this).attr('idUser');
            let id_int = parseInt(id);
            console.log('ss' + id);
            $.ajax({
                type: 'GET',
                url: `/matricula/${id_int}/verClasse`,
                success: function(data) {
                    let classe = $(`#${id}`).val()
                    console.log(classe)
                    console.log(data);
                    if (classe) {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: `/matricula/mudarClasse/classe/${id}/${classe}`,
                            contentType: "application/json",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            async: true,
                            success: function(response) {
                                console.log(response)
                                Swal.fire(
                                    'Classe Actualizada com sucesso',
                                    '',
                                    'success'
                                );
                            }
                        })
                    }
                }
            });
        });
    </script>

@endsection
