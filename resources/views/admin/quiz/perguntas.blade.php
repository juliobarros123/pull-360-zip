

@extends('layouts._includes.admin.app')

@section('titulo', 'Quizzes disponiveis')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            @isset($perguntas['0']->vc_materia )
            <h3>Perguntas sobre <strong>{{$perguntas['0']->vc_materia }}</strong></h3>
            @endisset
           
        </div>
    </div>
<br>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- sweetalert -->
        <script src="/js/sweetalert2.all.min.js"></script>
        @if (session('status'))
            <script>
                Swal.fire(
                    'Dados Actualizados com sucesso',
                    '',
                    'success'
                )
            </script>
        @endif
        <table class="table datatables table-hover table-bordered" id="dataTable-1">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>ID</th>
                    <th>PERGUNTAS</th>
                    <th>RESPOSTA</th>
                    <th>ACÇÕES</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @if ($perguntas)
                    @foreach ($perguntas as $pergunta)
                        <tr class="text-center">
                         
                            <th>{{ $pergunta->id_pergunta }}</th>
                            <th>{{ $pergunta->descricao_perguntas  }}</th>
                            
                            <th>{{ $pergunta-> descricao_respostas}}</th>
                            @csrf
                            @method('delete')
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-dark btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="{{ route('quizzes.perguntas_editar', $pergunta->id_pergunta) }}"
                                            class="dropdown-item">editar</a>
                                           <a href="{{ route('quizzes.perguntas_eliminar', $pergunta->id_pergunta) }}"
                                            class="dropdown-item">Eliminar</a>
                                    </div>

                                  
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
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

    </div>
</div>

    <!-- sweetalert -->
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

    @if (session('eliminar'))
    <script>
        Swal.fire(
            'Pergunta Eliminado com sucesso!',
            '',
            'success'
        )
    </script>
@endif

@endsection
