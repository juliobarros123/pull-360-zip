@extends('layouts._includes.admin.app')

@section('titulo', 'Supervisão')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">





        <div class="p-3">
            <div class="row">
                <h5 class="page-title col-md-6">
                    <!--{{ isset($materia->vc_materia) ? $materia->vc_materia : '' }}-->
                </h5>

                <h4 class="page-title col-md-4 offset-md-2 text-right">
                    Tema: {{  explode("-", $unidade->vc_unidade)[0] }}
                </h4>
            </div>

            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100   h-100 mt-3 rounded">

                @isset($materiaVideo['0'])
                    <h4 class=" h5 text-center mt-2 mb-5 "> 
                        <!--Tele-aula sobre-->
                        <strong>{{ $materiaVideo['0']->vc_materia }}</strong>
                    </h4>
                @endisset
                <section data-simplebar="init" class="d-flex justify-content-center">


                    <div class="row w-100">
                        @foreach ($materiaVideo as $video)
                            <div class="d-flex flex-column col-md-4 mt-3 ">

                                <h1 class="titulo-video cor-texto-dinamico">
                                  <!--  {{ $materiaVideo['0']->id_materia }}.ª
                                    Aula: {{ $video->vc_descricao }}--></h1>
                                <div class="card-custom d-flex flex-column dimensao-card-video p-4 mt-1 ">
                                    <video controls class="">
                                        <source src="{{ url("storage/{$video->vc_video}") }}" type="video/mp4"
                                            loading="lazy">
                                        <source src="{{ url("storage/{$video->vc_video}") }}" type="video/ogg"
                                            loading="lazy">

                                    </video>
                                    <h3 class="sub-titulo-video mt-2">{{ $video->vc_descricao }}</h3>
                                    <small class="detalhe-video ">{{ $video->vc_professor }} </small>
                                    <div class="reacao  d-flex flex-row mt-3">
                                        <div class="like">
                                            <a onclick="gostei({{ $video->id }})"> <i
                                                    class="fas fa-thumbs-up icon-like"></i></a>
                                            <small class="count"
                                                id="count-gosto-{{ $video->id_video }}">
                                                {{ $reacoes->where('id_video', $video->id_video)->where('reacao', 'gostei')->count() }}</small>
                                        </div>
                                        <div class="dislike">
                                            <small class="count"
                                                id="count-n-gosto-{{ $video->id_video }}">
                                                {{ $reacoes->where('id_video', $video->id_video)->where('reacao', 'nao gostei')->count() }}</small>
                                            <a onclick="n_gostei({{ $video->id }})"><i
                                                    class="fas fa-thumbs-up icon-dislike"></i></a>
                                        </div>

                                        <div class=" d-flex justify-content-end " style="width: 80%" >
                                            <div class="d-flex d-flex align-items-end justify-content-end col-10">
                                                <div class=" titulo-download size-detalhe-1 ">

                                                    Tamanho:
                                                    {{ formatBytes(filesize("storage/{$video->vc_video}")) }}
                                                    <br>
                                                    Data de lancamento: {{ date('d-m-Y', strtotime($video->created_at )) }}
                                                    <a href="{{ url("storage/{$video->vc_video}") }}" class="ml-1" download>
                                                        <i class="fas fa-cloud-download-alt icon-like texto-verde"></i>
                                                    </a>
                                                </div>

                                            </div>
                                          
                                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-sm  d-block mx-auto dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" style=" position: relative;
                                                    top: 10px;
                                                    left: 1px;"
                                                    aria-expanded="false"></button>

                                                <div class="dropdown-menu dropdown-menu-right">


                        
                                                            <a class="dropdown-item small"
                                                            href="{{ route('materia.addPdfPorVideo', $video->id) }}"
                                                            data-confirm="Tem certeza que deseja eliminar?"><i
                                                                class="fe fe-delete fe-12 mr-4"></i>Adicionar PDF</a>
                                                                <a class="dropdown-item small"
                                                                href="{{ route('materia.addAudioPorVideo', $video->id) }}"
                                                                data-confirm="Tem certeza que deseja eliminar?"><i
                                                                    class="fe fe-delete fe-12 mr-4"></i>Adicionar Áudio</a>
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



                                    </div>

                                </div>
              

                                @foreach (videoPdfs($video->id_video) as $PDF)
                                
                                <div class=" mb-3 mt-3">
                                    <div class="card-custom rounded p-3">
                                        <div class="d-flex ">
                                            <div class="rounded  mr-2 d-flex align-items-center justify-content-center download-container"
                                                style="width: 12%;
                                                                                                        ">

                                                <a href="{!! url('storage/' . $PDF->vc_pdf) !!}" download>

                                                    <i class="fas fa-file-pdf texto-verde "></i>

                                                </a>
                                            </div>
                                            <div class="d-flex   " style="width: 88%;">
                                                <div class=" titulo-download  d-flex align-items-center "  style="width: 50%;">
                                                    <a class="titulo-download" href="{!! url('storage/' . $PDF->vc_pdf) !!}">
                                                        Baixar resumo da aula 
                                                    </a>
                                                </div>
                                                <div style="width:35%;" class=" titulo-download    d-flex align-items-center  justify-content-end  ">
                                                    <small  class="titulo-download   size-detalhe-1 ">
                                                        Tamanho  :{{ $PDF->it_size_pdf }} MB
                                                    </small>
                                               
                                                </div>
                                                <div style="width:10%;" class=" titulo-download    d-flex align-items-center  justify-content-end  ">
                                                    <small  class="titulo-download   size-detalhe-1 ml-2">
                                                        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                               
                                                        <div class="btn-group col-1">
                                                            <button type="button"
                                                                class="btn btn-sm  d-block mx-auto dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"  style="position: relative;
                                                                left: 19px;"
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
                                                    
                                                @endif
                                                    </small>
                                               
                                                </div>
                                             
                                   
                                            </div>
                                            {{-- <div
                                                class="d-flex d-flex align-items-end justify-content-end col-2 ">
                                                <div class=" titulo-download size-detalhe-1 ">

                                                    Tamanho: {{ $PDF->it_size_pdf }} MB

                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                                 
                                @endforeach


                                @foreach (videoAudios($video->id_video) as $audio)
                                    <div class=" mb-3 mt-1">
                                        <div class="card-custom rounded p-3">
                                            <div class="">
                                                <div class="d-flex d-flex align-items-center  w-100 ">

                                                    <audio controls="controls" class="w-100  ">
                                                        <source src="{!! url('storage/' . $audio->vc_audio) !!}" type="audio/mp3" />
                                                        Seu navegador não suporta HTML5
                                                    </audio>

                                                </div>
                                                <div class="d-flex mt-1">


                                                 

                                                    <div
                                                        class="d-flex d-flex align-items-end justify-content-end   " style="    width: 93%!important;">
                                                        
                                                           
                                                            <small  class="titulo-download   size-detalhe-1 ml-2">
                                                                Tamanho  : {{ formatBytes(filesize('storage/' . $audio->vc_audio)) }}
                                                            </small>
                                                        <div class=" titulo-download size-detalhe-1   " >
                                                           
                                                            <a href="{!! url('storage/' . $audio->vc_audio) !!}" download>
                                                                <i class="fas fa-cloud-download-alt texto-verde icon-like ml-1"></i>
                                                            </a>
                                                       
                                                        </div>
                                                        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                                        <div class="btn-group  d-flex align-items-end">
                                                            <button type="button"   style=" position: relative;
                                                            top: 10px;
                                                            left: 9px;"
                                                                class="btn btn-sm  d-block mx-auto dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"></button>
    
                                                            <div class="dropdown-menu dropdown-menu-right">
    
    
                                                                <a class="dropdown-item small"
                                                                    href="{{ route('materia.editarAudio', ['id_Audio' => $audio->id]) }}"><i
                                                                        class="fe fe-edit-3 fe-12 mr-4"></i>Editar</a>
                                                                <a class="dropdown-item small"
                                                                    href="{{ route('materia.excluirAudio', $audio->id) }}"
                                                                    data-confirm="Tem certeza que deseja eliminar?"><i
                                                                        class="fe fe-delete fe-12 mr-4"></i>Eliminar</a>
    
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach


                    </div>


                </section>



                {{-- @isset($videos_youtube['0'])
                    <h4 class=" h5 text-center mt-2 mb-5 "> Outros vídeos sobre
                        <strong>{{ $videos_youtube['0']->vc_materia }}</strong>
                    </h4>

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
                                                <button type="button" class="btn btn-sm  d-block mx-auto dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>

                                                <div class="dropdown-menu dropdown-menu-right">


                                                    <a class="dropdown-item small"
                                                        href="{{ route('materia.adicionar_video_youtube_editar', ['id' => $video->id_video]) }}"><i
                                                            class="fe fe-edit-3 fe-12 mr-4"></i>Editar</a>
                                                    <a class="dropdown-item small"
                                                        href="{{ route('materia.adicionar_video_youtube_eliminar', $video->id_video) }}"
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
                @endisset --}}



                {{-- <div class="w-100 mb-4 mt-4">
                    <div class="mb-4">Arquivos
                        sobre Aulas</div>
                    <div class="calendar rounded bg-white px-3 py-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center"> <i class="fas fa-book-open text-purple"
                                    aria-hidden="true"></i>
                                <span class="small  text-muted ml-2">Arquivos</span>
                            </div>
                            <div class="d-flex align-items-center">
                               
                            </div>
                        </div>
                        <hr class="my-1">
                        <div class=" table-responsive">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <td scope="col">
                                            <div class="d-inline-block"> <strong>Arquivo pdf </strong> </div>
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
                                                            class="btn btn-sm  d-block mx-auto dropdown-toggle"
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
                </div> --}}


                {{-- <div class="w-100 mb-4">
              
                    <div class="calendar rounded bg-white px-3 py-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center"> <i class="fas fa-file-audio text-purple"
                                    aria-hidden="true"></i>
                                <span class="small  text-muted ml-2">Arquivos</span>
                            </div>
                            <div class="d-flex align-items-center">
                            
                            </div>
                        </div>
                        <hr class="my-1">
                        <div class=" table-responsive">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <td scope="col">
                                            <div class="d-inline-block"> <strong>Arquivos de áudio</strong> </div>
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
                                    @foreach ($materiaAudio as $audio)
                                        <tr>
                                            <td scope="row">
                                                <div class="d-inline-block"> <audio controls="controls">
                                                        <source src="{!! url('storage/' . $audio->vc_audio) !!}" type="audio/mp3" />
                                                        Seu navegador não suporta HTML5
                                                    </audio></div>
                                            </td>
                                            <td scope="row">
                                                <div class="d-inline-block"> <a href="{!! url('storage/' . $audio->vc_audio) !!}"
                                                        target="_blank">
                                                        <p class="mb-0 text-dark">{{ $audio->vc_descricao }}</p>
                                                    </a></div>
                                            </td>

                                            <td>
                                                <div class="">
                                                    {{ formatBytes(filesize('storage/' . $audio->vc_audio)) }}</div>
                                            </td>
                                            <td>
                                                <div class="">{{ $audio->created_at }}</div>
                                            </td>
                                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-sm  d-block mx-auto dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"></button>

                                                        <div class="dropdown-menu dropdown-menu-right">


                                                            <a class="dropdown-item small"
                                                                href="{{ route('materia.editarAudio', ['id_Audio' => $audio->id]) }}"><i
                                                                    class="fe fe-edit-3 fe-12 mr-4"></i>Editar</a>
                                                            <a class="dropdown-item small"
                                                                href="{{ route('materia.excluirAudio', $audio->id) }}"
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
                </div> --}}
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
                @if (session('status'))
                <script>
                    Swal.fire(
                        'Ficheiro adicionado com sucesso',
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
