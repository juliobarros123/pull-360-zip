
@extends('layouts._includes.admin.app')

@section('titulo', 'Supervisão')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                @isset($videos_youtube['0'])

                Outros vídeos sobre <strong>{{ $videos_youtube['0']->vc_materia }}</strong> 
           @endisset
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
        <style>
            hr {
                margin-top: 1rem;
                margin-bottom: 1rem;
                border: 0;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
            }
            
            iframe{
                width: 100%;
                background-color: black;
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
