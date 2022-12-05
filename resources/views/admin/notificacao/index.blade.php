

 @extends('layouts._includes.admin.app')

@section('titulo', 'Lista de Notificações')

@section('conteudo')
<script src="/js/sweetalert2.all.min.js"></script>


    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Lista de Notificações
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table datatables table-hover table-bordered" id="dataTable-1">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>TIPO</th>
                        <th>DESCRIÇÃO</th>
                        {{-- <th>ACÇÕES</th>
                    </tr> --}}
                </thead>
                <tbody class="bg-white text-center">
                    
                @foreach ($notificacoes as $notificacaoo)
                        <tr>
                            <td>{{$notificacaoo->vc_assunto}}</td>
                            <td>{{$notificacaoo->vc_descricao}}</td>
                            {{-- <td>
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-clone" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    
                                        <a class="dropdown-item"
                                            href="#">VER</a>
                                    </div>
                                </div>
                            </td> --}}
                        </tr>
            @endforeach   
                </tbody>
            </table>
           
         
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

@endsection
