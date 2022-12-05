@extends('layouts._includes.admin.app')

@section('titulo', ' Respostas')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5"> Respostas</h5>

            <div class="row">
                @foreach ($respostas as $resposta)
                    <div class="col-md-3 mb-3">

                        <div class="bg-white shadow rounded card p-3">
                            <div class="card p-3 py-4">
                                <div class="text-center"> <img src="{{ url("storage/{$resposta->profile_photo_path}") }}" width="100"
                                        class="rounded-circle"> </div>
                                <div class="text-center mt-3">
                                    {{-- <span
                                        class="bg-secondary p-1 px-4 rounded text-white">Pro</span> --}}
                                    <h5 class="mt-2 mb-0">{{ $resposta->vc_nomeUtilizador }}</h5>
                                    <span>{{ $resposta->vc_disciplina }}-{{ $resposta->vc_classe }}ª Classe</span>
                                    <div class="px-4 mt-1">
                                        <p class="fonts">{{ $resposta->vc_tarefa }}
                                        </p>
                                    </div>
                                    {{-- <ul class="social-list">
                                        <li><i class="fa fa-facebook"></i></li>
                                        <li><i class="fa fa-dribbble"></i></li>
                                        <li><i class="fa fa-instagram"></i></li>
                                        <li><i class="fa fa-linkedin"></i></li>
                                        <li><i class="fa fa-google"></i></li>
                                    </ul> --}}
                                    <div class="buttons row p-3 ">
                                        {{-- <a href="{{ url("storage/{$resposta->vc_pdf}") }}"
                                            target="_blanck"
                                            class="col m-1 btn btn-sm btn-tertiary text-uppercase rounded-pill d-block mx-auto px-3 w-50">Currigir</a> --}}
                                        <a href="{{ url("storage/{$resposta->vc_pdf}") }}" target="_blanck"
                                            class=" w-50 m-1 btn btn-sm btn-tertiary text-uppercase rounded-pill d-block mx-auto px-3 w-50">Ver
                                            resposta</a> </div>
                                </div>
                            </div>



                        </div>
                    </div>
                @endforeach
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
        <!-- Footer-->
    </div>


    <script src="/js/sweetalert2.all.min.js"></script>

@endsection
