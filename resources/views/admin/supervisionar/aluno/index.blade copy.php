@extends('layouts._includes.admin.app')

@section('titulo', 'Supervisão')

@section('conteudo')
<div class="card mb-2">
    <div class="card-body">
        <h2 class="h5 page-title">
            Estado da Matéria de
        </h2>
    </div>
</div>

@isset($materiaVideo['0'])

    <h4 class=" h5 text-center mt-2 mb-5"> Aulas em vídeo sobre
        <strong>{{ $materiaVideo['0']->vc_materia }}</strong>
    </h4>

    <section data-simplebar="init" style="height:420px; overflow-y: auto; overflow-x: hidden;">
     



            <div class="card  mb-4">

                @isset($materiaVideo['0'])


                    <div class="card-body">

                        <div class="card-body shadow-sm">
                            <div class="row">

                                @foreach ($materiaVideo as $video)
                                    <div class="card col-sm-4">
                                        <div class="card-body ">
                                            <iframe width="901" height="380" src="{{ url("storage/{$video->vc_video}") }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>

                                            <p class="card-text p-2">
                                                {{ $video->vc_descricao }}
                                            </p>
                                            <form class="form" action="" method="post">
                                           @csrf
                                            <div class="card">
                                                <div class="card-body row">
                                                    <img src="/images/materia/up.png" alt=""  id="gostei_{{$video->id_video}}" style="height: 30px">
                                                    <small id="n_gostei_{{$video->id_video}}" class="mt-3" style="color:green">
                                                       {{$reacoes->where('id_video',$video->id_video)->where('reacao','gostei')->count()}}</small>
        
                                                       <img src="/images/materia/down.png" alt="" id="naogostei_{{$video->id_video}}" style="height: 30px" class="ml-2">
                                                       <small id="n_nao_gostei_{{$video->id_video}}" class="mt-3 text-danger">
                                                   {{$reacoes->where('id_video',$video->id_video)->where('reacao','nao gostei')->count()}}</small>
                                                </div>
                                            </div>
                                        </form>
                                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                                                <button type="button"
                                                    class="btn btn-link dropdown-toggle more-vertical p-0 text-dark mx-auto"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu m-2">
                                                    <a href="{{ route('materia.editarVideo', ['id_materia' => $materia->id, 'id_video' => $video->id]) }}"
                                                        class="dropdown-item"><i class="fe fe-edit-3 fe-12 mr-4"></i>Editar</a>
                                                    <a href="{{ route('materia.excluirVideo', $video->id) }}"
                                                        class="dropdown-item" data-confirm="Tem certeza que deseja eliminar?"><i
                                                            class="fe fe-delete fe-12 mr-4"></i>Eliminar</a>

                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                    
                                @endforeach

                            </div>
                        </div>

                    </div>
                @endisset

            </div>



            <div class="card ">
                <div class="card-body">
                    <h2 class="h5 page-title text-center">
                    Outros vídeos sobre <strong>{{ $videos_youtube['0']->vc_materia }}</strong>
                    </h2>
                </div>
            </div>
            <div class="card  mb-4">

                @isset($videos_youtube['0'])


                    <div class="card-body">

                        <div class="card-body shadow-sm">
                            <div class="row">

                                @foreach ($videos_youtube as $video)
                                    <div class="card col-sm-4">
                                        <div class="card-body ">

                                            @php
                                                echo $video->vc_link;
                                            @endphp

                                            <p class="card-text p-2">
                                                {{ $video->vc_descricao }}
                                            </p>
                                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                                                <div class="dropdown">
                                                    <button type="button"
                                                    class="btn btn-link dropdown-toggle more-vertical p-0 text-dark mx-auto"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


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
                                @endforeach

                            </div>
                        </div>

                    </div>
                @endisset

            </div>

  
    </section>


@endisset



</div>
</div>
<div class="card mt-1 mb-4">

    <div class="card-body">
        <h4 class="text-center my-3 h5">PDF de Aulas</h4>
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



@endsection
