@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de utilizadores')

@section('conteudo')
<div class="page-wrapper p-2 p-md-5">
    <div class="p-3">
         <h5 class="mb-5">Lista de utilizadores</h5>
   

        <div class="">
            <table class="table mb-0" id="dataTable">
                <thead class="table-blue small">
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">FOTOGRAFIA</th>
                        <th scope="col">E-MAIL</th>
                        <th scope="col">Nº TELEFONE</th>
                        <th scope="col">TIPO DE UTILIZADOR</th>
                        <th scope="col">ACÇÃO</th>
                    </tr>
                </thead>
                <tbody class="bg-white shadow">
                    @if ($users)
                    @foreach ($users as $user)
                    <tr class="text-muted text-center small">
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->vc_primemiroNome . ' ' . $user->vc_apelido }}</td>
                        <td><img src="{{ url("storage/{$user->profile_photo_path}") }}"
                            alt="{{ $user->vc_primeiroNome . ' ' . $user->vc_ultimoNome }}" width="40"
                            style="border-radius:2px"></td>
                        <td>{{ $user->vc_email }}</td>
                        <td>{{ $user->vc_telefone }}</td>
                        <td><a style="cursor: pointer;" codigoD='{{ $user->id }}'
                            id="tag<%={{ $user->id }}%>">
                       @if ( Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')


                            <select id="{{ $user->id }}" name="utilizador" class="form-control border-0"
                                required>
                                <option value="">{{ $user->vc_tipoUtilizador=='Gestor_conteudo'?'Gestor de conteúdo':$user->vc_tipoUtilizador }}</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Professor">Professor</option>
                                <option value="Encarregado">Encarregado</option>
                                <option value="Aluno">Aluno</option>
                                <option  value="Diretor Municipal"> Diretor Municipal</option>
                                <option  value="Gestor_conteudo"> Gestor de conteúdo</option>
                                <option value="Supervisor">Supervisor
                                </option>
                                <option value="Chefe departamento provincial">Chefe departamento provincial</option>
                                @if (Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                    <option value="Desenvolvedor">Desenvolvedor</option>
                                @endif

                            </select>
                            @else
                               {{ $user->vc_tipoUtilizador }}
                            @endif
                            
                            {{-- {{ $user->vc_tipoUtilizador }} --}}
                        </a>
                    </td>
                   
                        <td>
                           
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>

            </table>
            {{-- <div class="d-flex justify-content-end p-3">
                {{ $users->onEachSide(5)->links() }}
             </div> --}}
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

<script>
$("a[id^='tag']").on("change", function() {
    var id = $(this).attr('codigoD');
    let id_int = parseInt(id);
    $.ajax({
        type: 'GET',
        url: `/admin/users/${id_int}/verPerfil`,
        success: function(data) {                  
            let perfil = $(`#${id}`).val()
            console.log(perfil)
            console.log(data);
            if (perfil) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: `mudarPerfil/perfil/${id}/${perfil}`,
                    contentType: "application/json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
</script>



@endsection
