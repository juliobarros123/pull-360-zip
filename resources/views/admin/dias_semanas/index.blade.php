@extends('layouts.admin')
@section('titulo', 'Lista de Dias de Semanas')
@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h3>Lista de Dias de Semanas</h3>
        </div>
    </div>



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
                <th>DIA DE SEMANA</th>
                <th>ACÇÕES</th>
            </tr>
        </thead>
        <tbody class="bg-white">

            @foreach ($dias_semanas as $dias_semana)
                <tr class="text-center">
                    <th>{{ $dias_semana->id }}</th>
                    <th>{{ $dias_semana->vc_dia }}</th>
                    @csrf
                    @method('delete')
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="{{ route('dias_semanas.edit', $dias_semana->id) }}"
                                    class="dropdown-item">Editar</a>
                                <a href="{{ route('dias_semanas.delete', $dias_semana->id) }}" class="dropdown-item"
                                    data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

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



@endsection
