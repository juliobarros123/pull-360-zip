@extends('layouts._includes.admin.app')

@section('titulo', ' Lista de agentes')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de agente de educação e ensino</h5>

          
            <div class="custom-table table-responsive radius-top-3">
                <table class="table mb-0" id="dataTable" >
                    <thead class="table-blue small">
                        <tr class="text-center">




                            <th scope="col">ID</th>
                            <th scope="col">PROFESSOR</th>
                            <th scope="col">PROVÍNCIA</th>

                            <th scope="col">NÚMERO DE BILHETE DE IDENTIDADE</th>
                            <th scope="col">NÚMERO DE AGENTE</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white shadow">
                        @foreach ($dependencias as $dependencia)
                            <tr class="text-muted text-center small">
                                <td>{{ $dependencia->id }}</td>
                                <td>{{ $dependencia->vc_professor }}</td>
                                <td>{{ $dependencia->vc_provincia }}</td>
                                <td>{{ $dependencia->vc_BI }}</td>
                                <td>{{ $dependencia->it_numero_agente }}</td>
                               
                                
                            </tr>
                        @endforeach

                    </tbody>

                </table>
              
                <div class="d-flex justify-content-end p-3">
                    {{ $dependencias->onEachSide(5)->links() }}
                </div>
            </div>

        </div>

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

    <script src="/js/sweetalert2.all.min.js"></script>

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
