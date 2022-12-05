@extends('layouts._includes.admin.app')

@section('titulo', ' Lista de alunos vinculados à escola')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5"> Lista de alunos vinculados à escola</h5>

            <script src="/js/sweetalert2.all.min.js"></script>
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

            <div class="custom-table table-responsive radius-top-3">
                <table class="table mb-0">
                    <thead class="table-blue small">
                        <tr class="text-center">


                            <th scope="col">ID</th>
                            <th scope="col">UTILIZADOR</th>
                            <th scope="col">ESCOLA</th>
                            <th scope="col">CLASSE</th>
                            <th scope="col">ANO LECTIVO</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white shadow">
                        @foreach ($matriculas as $matricula)
                            <tr class="text-muted text-center small">
                                <th>{{ $matricula->id }}</th>
                                <th>{{ $matricula->vc_primemiroNome . ' ' . $matricula->vc_apelido }}</th>

                                <th>{{ $matricula->vc_escola }}</th>

                                <th>
                                    <a style="cursor: pointer;" codigoMat='{{ $matricula->id }}'
                                        id="tagMat<%={{ $matricula->id }}%>">
                                        <select id="{{ $matricula->id }}" name="it_id_classe" class="form-control border-0"
                                            required>
                                            <option value="">{{ $matricula->vc_classe }} ª classe</option>
                                            @foreach ($classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->vc_classe }} ª classe
                                                </option>
                                            @endforeach

                                        </select>
                                    </a>
                                    {{-- {{$matricula->vc_classe}}ª classe</th> --}}
                                <th>{{ $matricula->ya_inicio . ' - ' . $matricula->ya_fim }}</th>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu dropdown-menu-right table-responsive">
                                            <a href="{{ route('matricula.edit', $matricula->id) }}"
                                                class="dropdown-item small">Editar</a>
                                            <a href="{{ route('matricula.delete', $matricula->id) }}"
                                                class="dropdown-item small"
                                                data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="d-flex justify-content-end p-3">
                    {{ $matriculas->onEachSide(5)->links() }}
                </div>
            </div>

        </div>
        <script src="/js/datatables/jquery-3.5.1.js"></script>

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

        <script>
            $("a[id^='tagMat']").on("change", function() {
                var id = $(this).attr('codigoMat');
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

    </div>




@endsection
