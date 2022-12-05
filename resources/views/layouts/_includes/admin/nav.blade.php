<style>
    .container-notificao {
        /* width: 230px !important; */
        width:190px ;
    }

</style>


<nav class="navbar navbar-expand-sm bg-white navbar-light py-3"> <a class="navbar-brand" href="/"><i
            class="fas fa-arrow-circle-left text-white rounded-circle  icon-back-color"></i></a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item my-auto px-2 px-md-4 ">
            <div class="btn-group ">
                <div class="d-flex align-items-center"> <a href="#"
                        class="d-block text-decoration-none text-muted notification-container" data-toggle="dropdown"
                        aria-expanded="false">

                        <i class="fas fa-bell"></i>

                        <div class="number-container d-flex align-items-center justify-content-center p-2 ">
                            {{ notificacoes_materia()->count() + notificacoes_terefa()->count() }}</div>


                        <div class="dropdown    ">





                            <div class="dropdown-menu bg-white p-2 rounded border-0  container-notificao  "
                                style="height: 900px;overflow: scroll;" style="width:500px">
                                @foreach (notificacoes() as $item)
                                    @if (isset($item->id_materia))
                                        <div class=" mt-1 "
                                            style="{{ notificacaoVista($item->id) ? 'opacity: 0.5' : '' }}">
                                            <div class="toast-header">


                                            </div>
                                            <div class="toast-body row ">
                                             
                                                <div class="col-md-12">

                                                    <a style="font-size: 15px; cursor:point;color: #3055A5"
                                                        class="text-decoration-none "
                                                        href="{{ route('materia.aluno', ['id' => $item->it_id_classeDisciplina, 'id_unidade' => $item->it_id_unidadeMateria]) }}">
                                                        {{ $item->notificacao }}</a>
                                                </div>

                                                <div class="col-md-12">

                                                    <small class=" ">há
                                                        {{ quantos_dias($item->created_at) }} </small>
                                                </div>





                                            </div>
                                        </div>
                                        <hr>
                                    @else
                                        <div class="mt-1 "
                                            style="{{ notificacaoVistaTarefa($item->id) ? 'opacity: 0.5' : '' }}">
                                            <div class="toast-header">


                                            </div>
                                            <div class="toast-body row ">
                                              
                                                <div class="col-md-12">

                                                    <a style="font-size: 15px; cursor:point;color: #3055A5"
                                                        class="text-decoration-none "
                                                        href="{{ route('alunos.minhaTarefa', ['id_classe_disciplina' => $item->id_classe_disciplinas]) }}">
                                                        {{ $item->notificacao }}</a>
                                                </div>

                                                <div class="col-md-12">

                                                    <small class=" ">há
                                                        {{ quantos_dias($item->created_at) }} </small>
                                                </div>





                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach


                            </div>
                        </div>


                    </a>
                </div>
                <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item" type="button">Olá</button>
                </div>
            </div>
        </li>
        <li class="nav-item my-auto px-2 px-md-4">
            <div class="btn-group avatar-container  {{(Auth::User()->vc_tipoUtilizador == 'Professor')?'avatar-azul':''}} {{(Auth::User()->vc_tipoUtilizador == 'Filho')?'avatar-laranja':''}}">
                <div class="d-flex align-items-center">
                    @php
                        $img = Auth::User()->profile_photo_path;
                    @endphp
                    @if (isset($img))
                        <img src="{{ url("storage/{$img}") }}" alt="Imagem de Perfil" class="avatar">
                    @endif
                    <a href="#"
                        class="d-block ml-1 ml-md-3 font-weight-bold dropdown-toggle text-decoration-none nomeUtilizador "
                        data-toggle="dropdown" aria-expanded="false">


                        {{ Auth::User()->vc_nomeUtilizador  }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right {{(Auth::User()->vc_tipoUtilizador == 'Professor')?'bg-laranja':''}} {{(Auth::User()->vc_tipoUtilizador == 'Filho')?'bg-azul':''}}" > <a
                            href="{{ route('admin.users.perfil', Auth::User()->id) }}"
                            class="dropdown-item small  {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho'  )?'text-light':'text-muted'}}" type="button">Perfil</a>
                        @if (!(Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno'))
                            <a href="{{ route('admin.users.editar', Auth::user()->id) }}"
                                class="dropdown-item small {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' )?'text-light':'text-muted'}}" type="button">Editar</a>
                        @endif
                        <a href="{{ route('admin.users.editar.passe', Auth::user()->id) }}"
                            class="dropdown-item small {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' )?'text-light':'text-muted'}}" type="button">Editar palavra-passe</a>
                        <a class="dropdown-item small {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' )?'text-light':'text-muted'}}" href="{{ route('logout') }}" id="sessao"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Terminar a Sessão
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item my-auto pl-2 d-block d-md-none">
            <button type="button" data-toggle="aside-menu" data-target=".aside" class="navbar-toggler border-0"><span
                    class="navbar-toggler-icon"></span>

            </button>
        </li>
    </ul>
</nav>
