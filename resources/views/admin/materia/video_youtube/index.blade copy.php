
@extends('layouts._includes.admin.app')

@section('titulo', 'Supervisão')

@section('conteudo')

    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
            Outros vídeos sobre  {{ $videos_youtube['0']->vc_materia }}
            </h2>
        </div>
    </div>
    <div class="card  mb-4">
        @isset($videos_youtube['0'])


            <div class="card-body">
                <h4 class="card-title mb-4 ml-4 mt-4">Vídeos</h4>

                <div class="card">
                    <div class="card-body shadow-sm">
                        <div class="row">

                            @foreach ($videos_youtube as $video)
                                <div class="col-md-3  ">


                                    @php
                                    echo $video->vc_link;
                                @endphp 

                                    <p class="card-text p-2">
                                        {{ $video->vc_descricao }}
                                    </p>
                                    @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                                        <div class="dropdown">
                                            <button class="btn btn-dark btn-sm dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                                <a href="{{ route('materia.editarVideo', ['id_materia' => 1, 'id_video' => $video->id_video]) }}"
                                                    class="dropdown-item">Editar</a>

                                                <a href="{{ route('materia.excluirVideo', $video->id_video) }}"
                                                    class="dropdown-item"
                                                    data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>

                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        @endisset
        <style>
            hr {
                margin-top: 1rem;
                margin-bottom: 1rem;
                border: 0;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
            }
        </style>

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

@endsection
