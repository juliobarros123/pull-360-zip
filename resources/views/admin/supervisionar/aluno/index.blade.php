@extends('layouts._includes.admin.app')

@section('titulo', 'Supervisão')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">



   


        <div class="p-3">
            <div class="row">
                <h5 class="page-title col-md-6">
                    {{ isset($classeDisciplina['0']) ? $classeDisciplina['0']->vc_disciplina : '' }}
                    {{ isset($classeDisciplina['0']) ? $classeDisciplina['0']->vc_classe : '' }}.ª classe</h5>

                <h4 class="page-title col-md-4 offset-md-2 text-right cor-texto-dinamico">
                    Tema: {{  explode("-", $unidade->vc_unidade)[0] }}
                </h4>
            </div>

            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100   h-100 mt-3 rounded">


                @foreach ($materias as $materia)
                    @if ($materiaVideo->where('id_materia', $materia->id)->count() || $materiaPDF->where('id_materia', $materia->id)->count())
                        {{-- <div class="card">
                    <div class="card-body">
                        <div class="card-text col-md-2 text-center h5">{{ $loop->iteration }}.ª Aula:</div>
                    </div>
                </div> --}}

                        <h4 class=" h5 text-center mt-2 mb-5 cor-texto-dinamico titulo-aula">{{ $loop->iteration }}.ª Aula:
                            
                            <strong>{{ $materia->vc_materia }}</strong>
                        </h4>

                        <section data-simplebar="init" class="d-flex justify-content-center">


                            @isset($materiaVideo['0'])
                                <div class="row w-100">
                                    @foreach ($materiaVideo as $video)
                                        <div class="d-flex flex-column col-md-4 mt-3 ">

                                            <h1 class="titulo-video cor-texto-dinamico">
                                            <!--    
                                            {{ $materiaVideo['0']->id_materia }}
                                                .ª  Aula - {{ $video->vc_descricao }}-->
                                            </h1>
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
                                                                class="fas fa-thumbs-up icon-like "></i></a>
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

                                                    <div class=" d-flex justify-content-end " style="width: 80%">
                                                        <div class="d-flex d-flex align-items-end justify-content-end col-10">
                                                            <div class=" titulo-download size-detalhe-1 ">

                                                                Tamanho:
                                                                {{ formatBytes(filesize("storage/{$video->vc_video}")) }}
                                                                <br>
                                                                Data de lancamento:
                                                                {{ date('d-m-Y', strtotime($video->created_at)) }}
                                                                <a href="{{ url("storage/{$video->vc_video}") }}"
                                                                    class="ml-1" download>
                                                                    <i class="fas fa-cloud-download-alt icon-like texto-verde"></i>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>



                                                </div>

                                            </div>


                                            @foreach (videoPdfs($video->id) as $PDF)
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
                                                                <div class=" titulo-download  d-flex align-items-center "
                                                                    style="width: 50%;">
                                                                    <a class="titulo-download" href="{!! url('storage/' . $PDF->vc_pdf) !!}">
                                                                        Baixar resumo da aula
                                                                    </a>
                                                                </div>
                                                                <div style="width:40%;"
                                                                    class=" titulo-download    d-flex align-items-center  justify-content-end  ">
                                                                    <small class="titulo-download   size-detalhe-1 ml-2">
                                                                        Tamanho :{{ $PDF->it_size_pdf }} MB
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


                                            @foreach (videoAudios($video->id) as $audio)
                                                <div class=" mb-3 mt-">
                                                    <div class="card-custom rounded p-3">
                                                        <div class="">
                                                            <div class="d-flex d-flex align-items-center  w-100 ">

                                                                <audio controls="controls" class="w-100  ">
                                                                    <source src="{!! url('storage/' . $audio->vc_audio) !!}" type="audio/mp3" />
                                                                    Seu navegador não suporta HTML5
                                                                </audio>

                                                            </div>
                                                            <div class="d-flex mt-1">


                                                                {{-- <div class="rounded p-2 mr-2 d-flex align-items-center justify-content-center download-container"
                                                                style="width: 39px;
                                                                                                        ">

                                                       
                                                            </div> --}}

                                                                <div class="d-flex d-flex align-items-end justify-content-end   "
                                                                    style="    width: 93%!important;">


                                                                    <small class="titulo-download   size-detalhe-1 ml-2">
                                                                        Tamanho :
                                                                        {{ formatBytes(filesize('storage/' . $audio->vc_audio)) }}
                                                                    </small>
                                                                    <div class=" titulo-download size-detalhe-1   ">
                                                                        {{-- Tamanho:
                                                                        {{ formatBytes(filesize('storage/' . $audio->vc_audio)) }} --}}
                                                                        <a href="{!! url('storage/' . $audio->vc_audio) !!}" download>
                                                                            <i
                                                                                class="fas fa-cloud-download-alt texto-verde icon-like ml-1"></i>
                                                                        </a>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach


                                </div>
                            @endisset


                        </section>
                    @endif
                @endforeach
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
