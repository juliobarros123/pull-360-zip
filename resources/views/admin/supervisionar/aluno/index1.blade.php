@extends('layouts._includes.admin.app')

@section('titulo', ' Supervisionar matéria')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <div class="card mb-2">
                <div class="card-body row">
                    <h2 class="h5 page-title col-md-6">
                        
                        {{ isset($classeDisciplina['0']) ? $classeDisciplina['0']->vc_disciplina : '' }}  
                        {{ isset($classeDisciplina['0']) ? $classeDisciplina['0']->vc_classe : '' }}ª classe
                    </h2>
                    <h4 class="page-title col-md-4 offset-md-2 text-right">
                        Tema: {{ $unidade->vc_unidade }}
                    </h4>
                </div>
            </div>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">

                @foreach ($materias as $materia)
                    <div class="card">
                        <div class="card-body">
                            <div class="card-text col-md-2 text-center h5">{{ $loop->iteration }} ª Aula</div>
                        </div>
                    </div>
                    <h4 class=" h5 text-center mt-2 mb-5"> <!--Tele-aula sobre-->
                        <strong>{{ $materia->vc_materia }}</strong>
                    </h4>
                    <section data-simplebar="init" style="height:420px; overflow-y: auto; overflow-x: hidden;">
                        <div class="card  mb-4">

                            {{-- @isset($materiaVideo['0']) --}}


                            <div class="card-body">

                                <div class="card-body shadow-sm">
                                    <div class="row">

                                        @foreach ($materiaVideo as $video)
                                            @if ($video->id_materia == $materia->id)
                                                <div class="card col-sm-4">
                                                    <div class="card-body ">
                                                        {{-- <video width="901" height="380" src="{{ url("storage/{$video->vc_video}") }}"  loading="lazy"
                                                        class="playerID"></video> --}}
                                                        {{-- <video width="320" height="240" >
                                                           
                                                                <embed width="320" height="240" src="{{ url("storage/{$video->vc_video}")}}"  >
                                                     
                                                          </video> --}}

                                                        <video controls class="container-fluid">
                                                            <source src="{{ url("storage/{$video->vc_video}") }}"
                                                                type="video/mp4" loading="lazy">
                                                            <source src="{{ url("storage/{$video->vc_video}") }}"
                                                                type="video/ogg" loading="lazy">

                                                        </video>
                                                        <p class="card-text p-2">
                                                            {{ $video->vc_descricao }}
                                                        </p>
                                                        <form class="form" action="" method="post">
                                                            @csrf
                                                            {{-- <div class="card">
                                                                <div class="card-body row">

                                                                    <img src="/images/materia/up.png" alt=""
                                                                        id="gostei_{{ $video->id_video }}"
                                                                        style="height: 25px">
                                                                    <small id="n_gostei_{{ $video->id_video }}"
                                                                        class="mt-2" style="color:green">
                                                                        {{ $reacoes->where('id_video', $video->id_video)->where('reacao', 'gostei')->count() }}</small>

                                                                    <img src="/images/materia/down.png" alt=""
                                                                        id="naogostei_{{ $video->id_video }}"
                                                                        style="height: 25px" class="ml-2">

                                                                    <small id="n_nao_gostei_{{ $video->id_video }}"
                                                                        class="text-danger mt-2">
                                                                        {{ $reacoes->where('id_video', $video->id_video)->where('reacao', 'nao gostei')->count() }}</small>
                                                                </div>
                                                            </div> --}}
                                                        </form>
                                                        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                                            <button type="button"
                                                                class="btn btn-link dropdown-toggle more-vertical p-0 text-dark mx-auto"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
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
                                            @endif
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                            {{-- @endisset --}}

                        </div>



                        <div class="card ">
                            <div class="card-body">
                                <h2 class="h5 page-title text-center">
                                    Outros vídeos sobre <strong>{{ $materia->vc_materia }}</strong>
                                </h2>
                            </div>
                        </div>
                        <div class="card  mb-4">




                            <div class="card-body">

                                <div class="card-body shadow-sm">
                                    <div class="row">

                                        @foreach ($videos_youtube as $video)
                                            @if ($video->id_materia == $materia->id)
                                                <div class="card col-sm-4">
                                                    <div class="card-body ">

                                                        @php
                                                            echo $video->vc_link;
                                                        @endphp

                                                        <p class="card-text p-2">
                                                            {{ $video->vc_descricao }}
                                                        </p>
                                                        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn btn-link dropdown-toggle more-vertical p-0 text-dark mx-auto"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">


                                                                    <a href="{{ route('materia.adicionar_video_youtube_editar', ['id' => $video->id_video]) }}"
                                                                        class="dropdown-item">Editar</a>

                                                                    <a href="{{ route('materia.adicionar_video_youtube_eliminar', $video->id_video) }}"
                                                                        class="dropdown-item"
                                                                        data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>

                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>

                            </div>


                        </div>


                    </section>






                    <div class="card mt-1 mb-4">

                        <div class="card-body">
                            <h4 class="text-center my-3 h5">Arquivos sobre  {{ $materia->vc_materia }}</h4>
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
                                            @if ($PDF->id_materia == $materia->id)
                                                <tr>

                                                    <td class="text-center">
                                                        <a href="{!! url('storage/' . $PDF->vc_pdf) !!}" target="_blank">
                                                            <img src="/images/materia/pdf.png" alt="Lights"
                                                                style="width: 50px">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{!! url('storage/' . $PDF->vc_pdf) !!}" target="_blank">
                                                            <p class="mb-0 text-dark">
                                                                <strong>{{ $PDF->vc_descricao_pdf }}</strong>
                                                            </p>
                                                        </a>
                                                    </td>
                                                    <td class="text-dark"><strong>{{ $PDF->it_size_pdf }}
                                                            MB</strong></td>
                                                    <td class="text-dark"><strong>{{ $PDF->created_at }}</strong>
                                                    </td>
                                                    <td class=""><button
                                                            class="btn btn-lg dropdown-toggle more-vertical" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="text-muted sr-only">Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                                            <a class="dropdown-item" href="{!! url('storage/' . $PDF->vc_pdf) !!}"
                                                                target="_blank"><i
                                                                    class="fe fe-eye fe-12 mr-4"></i>Visualizar</a>
                                                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('materia.editarPDF', ['id_materia' => $materia->id, 'id_PDF' => $PDF->id]) }}"><i
                                                                        class="fe fe-edit-3 fe-12 mr-4"></i>Editar</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('materia.excluirPDF', $PDF->id) }}"
                                                                    data-confirm="Tem certeza que deseja eliminar?"><i
                                                                        class="fe fe-delete fe-12 mr-4"></i>Eliminar</a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach


                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao inserir o Ano lectivo !',
                '',
                'error'
            )
        </script>
    @endif

    @if (session('status'))
        <script>
            Swal.fire(
                'Ano Lectivo Cadastrado com Sucesso!',
                '',
                'success'
            )
        </script>
    @endif

    @if (session('aviso'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro ao cadastrar Ano Lectivo',
            })
        </script>
    @endif
@endsection










