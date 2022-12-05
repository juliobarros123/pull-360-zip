@extends('layouts._includes.admin.app')

@section('titulo', 'Supervisão')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Estado da Matéria de {{ $materia->vc_materia }}
            </h2>
        </div>


    </div>

    <div class="card">
        <div class="card-body">


            {{-- secção de videos --}}
            @isset($materiaVideo['0'])

                <h4 class="text-center mt-2 mb-5">Vídeo Aulas</h4>
                <section data-simplebar="init" style="height:420px; overflow-y: auto; overflow-x: hidden;">
                    <form id="cadUsuario" action="" method="post">
                        @csrf
                    <div class="row">
                       
                            
                        @foreach ($materiaVideo as $video)

                            <div class="col-md-6">

                                <div class="card shadow mb-3">
                                    <div class="card-body py-3">
                                        <div class="row align-items-center">

                                            <div class="col pr-1">
                                                <h5>Titulo: <b>{{ $video->vc_descricao }}</b></h5>
                                                <h6>Matéria: <b>{{ $video->vc_materia }}</b></h6>
                                                <video width="40%" height="150" controls>
                                                    <source class="pb-video-frame"
                                                        src="{{ url("storage/{$video->vc_video}") }}" type="video/mp4">
                                                </video>
                                            </div>

                                            <div class="col-auto">
                                                <a type="button"
                                                    class="small text-dark fe fe-12 fe-menu mr-1 d-block d-md-inline"
                                                    data-toggle="modal" data-target="#exampleModal{{ $video->id_video }}"
                                                    aria-haspopup="true" aria-expanded="false"></a>

                                                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                                                    <button type="button"
                                                        class="btn btn-link dropdown-toggle more-vertical p-0 text-dark mx-auto"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    </button>
                                                    <div class="dropdown-menu m-2">
                                                        <a href="{{ route('materia.editarVideo', ['id_materia' => $materia->id, 'id_video' => $video->id]) }}"
                                                            class="dropdown-item"><i
                                                                class="fe fe-edit-3 fe-12 mr-4"></i>Editar</a>
                                                        <a href="{{ route('materia.excluirVideo', $video->id) }}"
                                                            class="dropdown-item"
                                                            data-confirm="Tem certeza que deseja eliminar?"><i
                                                                class="fe fe-delete fe-12 mr-4"></i>Eliminar</a>

                                                    </div>
                                                @endif
                                            </div>
                                       
                                        </div>
                                    </div> <!-- / .card-body -->
                                </div> <!-- /.card -->
                              
                                   <input type="text" name="id_video" id="nome" value="{{$video->id_video}}" hidden>
                                  
                                    <div class="card">
                                        <div class="card-body row">
                                            <img src="/images/materia/up.png" alt=""  id="gostei_{{$video->id_video}}" style="height: 40px">
                                            <small id="n_gostei_{{$video->id_video}}" class="mt-3" style="color:green">
                                               {{$reacoes->where('id_video',$video->id_video)->where('reacao','gostei')->count()}}</small>

                                               <img src="/images/materia/down.png" alt="" id="naogostei_{{$video->id_video}}" style="height: 40px" class="ml-2">
                                               <small id="n_nao_gostei_{{$video->id_video}}" class="mt-3 text-danger">
                                           {{$reacoes->where('id_video',$video->id_video)->where('reacao','nao gostei')->count()}}</small>
                                        </div>
                                    </div>
                               


                                       
                                
                            </div>



                            <div class="modal fade" id="exampleModal{{ $video->id_video }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <dt class='col-6 text-dark'> Nome do arquivo</dt>
                                            <dd class='col-6'>{{ $video->vc_descricao }}</dd>
                                            <dt class='col-6 text-dark'> Tipo de Arquivo</dt>
                                            <dd class='col-6'>{{ $video->vc_tipo_de_aquirvo }}</dd>
                                            <dt class='col-6 text-dark'>Tamanho</dt>
                                            <dd class='col-6'>{{ $video->vc_tamanho }} MB</dd>
                                            <dt class='col-6 text-dark'>Data do Lançamento</dt>
                                            <dd class='col-6' id='criacao'>{{ $video->created_at }}</dd>
                                            <dt class='col-6 text-dark'>Ultima atualização</dt>
                                            <dd class='col-6' id='atualizacao'>{{ $video->updated_at }}</dd>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                   
                    </div>
                </form>
                </section>


            @endisset



        </div>
    </div>
    <div class="card mt-1 mb-4">

        <div class="card-body">
            <h4 class="text-center my-3">PDF de Aulas</h4>
            <section style="height:420px; overflow-y: auto; overflow-x: hidden;">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>

                            <th class="text-center">#</th>
                            <th>NOME DO ARQUIVO</th>
                            <th>DATA DE CRIAÇÃO</th>
                            <th>ACÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($materiaPDF as $PDF)
                            <tr>

                                <td class="text-center">
                                    <a href="{!! url('storage/' . $PDF->vc_pdf) !!}" target="_blank">
                                        <img src="/images/materia/pdf.png" alt="Lights" style="width: 50px">
                                    </a>
                                </td>
                                <td>
                                    <a href="{!! url('storage/' . $PDF->vc_pdf) !!}" target="_blank">
                                        <p class="mb-0 text-dark"><strong>{{ $PDF->vc_descricao_pdf }}</strong></p>
                                    </a>
                                </td>
                                <td class="text-dark"><strong>{{ $PDF->it_size_pdf }} MB</strong></td>
                                <td class="text-dark"><strong>{{ $PDF->created_at }}</strong></td>
                                <td class=""><button class="btn btn-lg dropdown-toggle more-vertical" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <a class="dropdown-item" href="{!! url('storage/' . $PDF->vc_pdf) !!}" target="_blank"><i
                                                class="fe fe-eye fe-12 mr-4"></i>Visualizar</a>
                                        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                                            <a class="dropdown-item"
                                                href="{{ route('materia.editarPDF', ['id_materia' => $materia->id, 'id_PDF' => $PDF->id]) }}"><i
                                                    class="fe fe-edit-3 fe-12 mr-4"></i>Editar</a>
                                            <a class="dropdown-item" href="{{ route('materia.excluirPDF', $PDF->id) }}"
                                                data-confirm="Tem certeza que deseja eliminar?"><i
                                                    class="fe fe-delete fe-12 mr-4"></i>Eliminar</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('delete'))
        <script>
            Swal.fire(
                'Ficheiro eliminado com sucesso',
                '',
                'success'
            )
        </script>
    @endif

    <style>
        .grab {
            cursor: pointer;
        }

    </style>
@endsection
