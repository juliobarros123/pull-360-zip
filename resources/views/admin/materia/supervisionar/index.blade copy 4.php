@extends('layouts._includes.admin.app')

@section('titulo', 'Supervisão')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
     

        <script>
            $(document).ready(function() {
                $('#lightgallery').lightGallery();
            });
        </script>
        <style>
            .lightGallery {
                width: 100%;
                margin: 0
            }


            .lightGallery .image-tile {
                position: relative;
                margin-bottom: 30px;
                margin-right: 10px
            }

            .lightGallery .image-tile .demo-gallery-poster {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0
            }

            .lightGallery .image-tile .demo-gallery-poster img {
                display: block;
                margin: auto;
                width: 40%;
                max-width: 60px;
                min-width: 20px;
                margin-top: 128px;
            }

        </style>

        

        <div class="p-3">
            <div class="row">
                <h5 class="page-title col-md-6">
                    {{ isset($materia->vc_materia) ? $materia->vc_materia : '' }}</h5>

                <h4 class="page-title col-md-4 offset-md-2 text-right">
                    Tema: {{ $unidade->vc_unidade }}
                </h4>
            </div>

            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100   h-100 mt-3 rounded">

                @isset($materiaVideo['0'])
                    <h4 class=" h5 text-center mt-2 mb-5 "> Tele-aula sobre
                        <strong>{{ $materiaVideo['0']->vc_materia }}</strong>
                    </h4>
                @endisset
                <section data-simplebar="init" style="height:420px; overflow-y: auto; overflow-x: hidden;">



                    @isset($materiaVideo['0'])

                        <div class="row lightGallery ">
                            @foreach ($materiaVideo as $video)
                                <div class=" shadow p-2  col-md-4 text-decoration-none" data-abc="true">

                                    <video controls class="w-100" height="300">
                                        <source src="{{ url("storage/{$video->vc_video}") }}" type="video/mp4" loading="lazy">
                                        <source src="{{ url("storage/{$video->vc_video}") }}" type="video/ogg" loading="lazy">

                                    </video>
                                    <div>
                                        <div class="font-weight-bold text-dark"> {{ $video->vc_descricao }}</div>
                                    </div>
                                    @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                                            <div class="dropdown-menu dropdown-menu-right">


                                                <a class="dropdown-item small"
                                                    href="{{ route('materia.editarVideo', ['id_materia' => $materia->id, 'id_video' => $video->id]) }}"><i
                                                        class="fe fe-edit-3 fe-12 mr-4"></i>Editar</a>
                                                <a class="dropdown-item small"
                                                    href="{{ route('materia.excluirVideo', $video->id) }}"
                                                    data-confirm="Tem certeza que deseja eliminar?"><i
                                                        class="fe fe-delete fe-12 mr-4"></i>Eliminar</a>

                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                        </div>

                    @endisset


                </section>



                @isset($videos_youtube['0'])
                <h4 class=" h5 text-center mt-2 mb-5 ">   Outros vídeos sobre
                    <strong>{{ $videos_youtube['0']->vc_materia }}</strong>
                </h4>
            @endisset
            <section data-simplebar="init" style="height:420px; overflow-y: auto; overflow-x: hidden;">



                @isset($videos_youtube['0'])

                    <div class="row lightGallery ">
                        @foreach ($videos_youtube as $video)
                            <div class=" shadow p-2  col-md-4 text-decoration-none" data-abc="true">

                                @php
                                                        echo $video->vc_link;
                                                    @endphp
                                <div>
                                    <div class="font-weight-bold text-dark"> {{ $video->vc_descricao }}</div>
                                </div>
                                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                                        <div class="dropdown-menu dropdown-menu-right">


                                            <a class="dropdown-item small"
                                                href="{{ route('materia.adicionar_video_youtube_editar', ['id' =>  $video->id_video]) }}"><i
                                                    class="fe fe-edit-3 fe-12 mr-4"></i>Editar</a>
                                            <a class="dropdown-item small"
                                                href="{{ route('materia.adicionar_video_youtube_eliminar',  $video->id_video) }}"
                                                data-confirm="Tem certeza que deseja eliminar?"><i
                                                    class="fe fe-delete fe-12 mr-4"></i>Eliminar</a>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div>

                @endisset


            </section>





                <div class="w-100 mb-4">
                    <div class="mb-4">Arquivos
                        sobre Aulas</div>
                    <div class="calendar rounded bg-white px-3 py-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center"> <i class="fas fa-book-open text-purple"
                                    aria-hidden="true"></i>
                                <span class="small  text-muted ml-2">Arquivos</span>
                            </div>
                            <div class="d-flex align-items-center">
                                {{-- <span
                                class="small font-weight-bold mr-2">Sexta-feira</span><i class="fas fa-chevron-right"
                                aria-hidden="true"></i> --}}
                            </div>
                        </div>
                        <hr class="my-1">
                        <div class=" table-responsive">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <td scope="col">
                                            <div class="d-inline-block"> <strong>Arquivos</strong> </div>
                                        </td>
                                        <td scope="col">
                                            <div class="d-inline-block"><strong>Nome do arquivo</strong></div>
                                        </td>
                                        <td scope="col">
                                            <div class="d-inline-block"><strong>Tamanho</strong></div>
                                        </td>
                                        <td scope="col">
                                            <div class="d-inline-block"><strong>Data de lançamento</strong></div>
                                        </td>
                                        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                            <td scope="col">
                                                <div class="d-inline-block"><strong>Ações</strong></div>
                                            </td>
                                        @endif



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materiaPDF as $PDF)
                                        <tr>
                                            <td scope="row">
                                                <div class="d-inline-block"> <a href="{!! url('storage/' . $PDF->vc_pdf) !!}"
                                                        target="_blank">
                                                        <i class="fas fa-file-pdf px-3 " style="font-size: 21px"></i>
                                                    </a></div>
                                            </td>
                                            <td scope="row">
                                                <div class="d-inline-block"> <a href="{!! url('storage/' . $PDF->vc_pdf) !!}"
                                                        target="_blank">
                                                        <p class="mb-0 text-dark">{{ $PDF->vc_descricao_pdf }}</p>
                                                    </a></div>
                                            </td>

                                            <td>
                                                <div class=""> {{ $PDF->it_size_pdf }} MB</div>
                                            </td>
                                            <td>
                                                <div class="">{{ $PDF->created_at }}</div>
                                            </td>
                                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"></button>

                                                        <div class="dropdown-menu dropdown-menu-right">


                                                            <a class="dropdown-item small"
                                                                href="{{ route('materia.editarPDF', ['id_materia' => $materia->id, 'id_PDF' => $PDF->id]) }}"><i
                                                                    class="fe fe-edit-3 fe-12 mr-4"></i>Editar</a>
                                                            <a class="dropdown-item small"
                                                                href="{{ route('materia.excluirPDF', $PDF->id) }}"
                                                                data-confirm="Tem certeza que deseja eliminar?"><i
                                                                    class="fe fe-delete fe-12 mr-4"></i>Eliminar</a>

                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

                    hr {
                        margin-top: 1rem;
                        margin-bottom: 1rem;
                        border: 0;
                        border-top: 1px solid rgba(0, 0, 0, 0.1);
                    }

                    iframe {
                        width: 100%;
                        background-color: black;
                    }

                </style>
            </div>
        </div>
    </div>
    <!-- sweetalert -->

@endsection
