@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de Utilizadores')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h5>Lista de Utilizadores</h5>
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
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table datatables table-hover table-bordered" id="dataTable-1">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>NOME</th>
                        <th>FOTO</th>
                        <th>Email</th>
                        <th>Nº TELEFONE</th>
                        <th>TIPO DE UTILIZADOR</th>
                        <th>ACÇÕES</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($users)
                        @foreach ($users as $user)
                            <tr class="text-center">
                                <th>{{ $user->id }}</th>
                                <th>{{ $user->vc_primemiroNome . ' ' . $user->vc_apelido }}</th>
                                <td><img src="{{ url("storage/{$user->profile_photo_path}") }}"
                                        alt="{{ $user->vc_primeiroNome . ' ' . $user->vc_ultimoNome }}" width="40" style="border-radius:2px"></td>
                                <th>{{ $user->vc_email }}</th>
                                <td>{{ $user->vc_telefone }}</td>
                                <td>{{ $user->vc_tipoUtilizador }}</td>
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
                                            <a href="{{ route('admin.users.editar', $user->id) }}"
                                                class="dropdown-item">Editar</a>
                                            <a href="{{ route('admin.users.excluir', $user->id) }}" class="dropdown-item"
                                                data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
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



@endsection
