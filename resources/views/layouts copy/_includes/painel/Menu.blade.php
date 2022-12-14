<nav class="topnav navbar navbar-light bg-white">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    {{-- <form class="form-inline mr-auto searchform text-muted">
        <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
            placeholder="Digite algo..." aria-label="Search">
    </form> --}}
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                <span class="fe fe-grid fe-16"></span>
            </a>
        </li> --}}
        <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="{{ route('verNotificacao') }}">
                <span class="fe fe-bell fe-16"></span>
                <span class="dot dot-md bg-success"></span>
                @if (Auth::User()->vc_tipoUtilizador == 'Filho')
                    {{ $notificacao ?? '' }}
                @endif
            </a>
        </li>
       
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    @php
                        $img = Auth::User()->profile_photo_path;
                    @endphp
                    @if (isset($img))
                        <img src="{{ url("storage/{$img}") }}" alt="..." class="avatar-img rounded-circle">
                    @endif
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('admin.users.perfil', Auth::User()->id) }}">Perfil</a>
                <a class="dropdown-item" href="{{ route('admin.users.editar', Auth::user()->id) }}">Configura????es</a>
                <a class="nav-link text-danger" href="{{ route('logout') }}" id="sessao"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Terminar a Sess??o
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </ul>
    
@isset($tempoSessao->tempo_contagem)
    

<div class="div" hidden>
    <p id="tempo_contagem" hidden>{{$tempoSessao->tempo_contagem}}</p>
    <p id="tempo_termino" hidden>{{$tempoSessao->tempo_termino}}</p>
</div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
              <h5 class="modal-title text-center  " id="exampleModalLabel">Alerta</h5>
              
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="card-title h4 text-center">Tempo limite para terminar sess??o {{$tempoSessao->tempo_termino}}</div>
                    <div class="card-text h5 text-center">Tempo em andamento:<span
                            class=" rounded cor-branco-detalhe   cor-branco-detalhe  " id="counter">
                            00:00:00</span></div>
                            <div class="card-title h6 text-warning text-center">Clica no bot??o abaixo para reiniciar a contagem
                             
                            </div>
                            
                </div>
            </div>
            <div class="modal-footer">
              <button class="form-control btn btn-primary " id="reiniciar" data-dismiss="modal">Reiniciar Contagem</button>
            
            </div>
          </div>
        </div>
      </div>

      @endisset

</nav>

@if (null !== Auth::user())
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100  d-flex">
                <a class="navbar-brand mx-auto  flex-fill text-center" href="{{ route('xilonga') }}">
                    <img rel="icon" src="/images/insignia/logo.png" style="width:50px; margin:auto" />

                </a>
            </div>


            <ul class="navbar-nav flex-fill w-100 mb-2">
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Painel</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ url('/home') }}">
                            <i class="fe fe-help-circle fe-16"></i>
                            <span class="ml-3 item-text">Painel</span>
                        </a>
                    </li>
                </ul>
                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span>Utilizadores</span>
                    </p>
                    <li class="nav-item dropdown">
                        <a href="#ui-elements" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-users fe-16"></i>
                            <span class="ml-3 item-text"> Utilizadores</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('admin/users/cadastrar') }}"><span
                                        class="ml-1 item-text">Cadastrar Utilizador</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('admin/users/listar') }}"><span
                                        class="ml-1 item-text">Listar Utilizadores</span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#professor" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-users fe-16"></i>
                            <span class="ml-3 item-text"> Professores</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="professor">


                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('professores/') }}"><span
                                        class="ml-1 item-text">Listar Professores</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('professores/professorEscola') }}"><span
                                        class="ml-1 item-text">Listar Professores | Escola</span></a>
                            </li>


                        </ul>
                    </li>
                @endif


                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')

                    <li class="nav-item dropdown">
                        <a href="#pai" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-credit-card fe-16"></i>
                            <span class="ml-3 item-text">Encarregados</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="pai">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('pais', Auth::user()->id) }}"><span
                                        class="ml-1 item-text">Listar Encarregados
                                    </span></a>
                            </li>


                        </ul>
                    </li>
                @endif


                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Encarregado')

                    <li class="nav-item dropdown">
                        <a href="#filho" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-user-check fe-16"></i>
                            <span class="ml-3 item-text">Educandos</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="filho">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('user.escrever', Auth::user()->id) }}"><span
                                        class="ml-1 item-text">Cadastrar Educando</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('user.filhos', Auth::user()->id) }}"><span
                                        class="ml-1 item-text">Listar Educandos
                                    </span></a>
                            </li>


                        </ul>
                    </li>

                @endif

                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span>Relat??rios</span>
                    </p>
                    <li class="nav-item dropdown">
                        <a href="#aluno" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-users fe-16"></i>
                            <span class="ml-3 item-text"> Alunos</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="aluno">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('ver_quantidade_alunos_classe') }}"><span
                                        class="ml-1 item-text">Alunos por Classe</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pl-3"
                                    href="{{ route('ver_quantidade_tarefas_submetidas') }}"><span
                                        class="ml-1 item-text">Tarefas Submetidas</span></a>
                            </li>

                        </ul>


                        <ul class="collapse list-unstyled pl-4 w-100" id="aluno">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('ver_alunos_provincia') }}"><span
                                        class="ml-1 item-text">Alunos por Prov??ncia</span></a>
                            </li>

                        </ul>
                        <ul class="collapse list-unstyled pl-4 w-100" id="aluno">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('admin/alunos/pesquisar') }}"><span
                                        class="ml-1 item-text">Alunos por Munic??pios</span></a>
                            </li>

                        </ul>

                        <ul class="collapse list-unstyled pl-4 w-100" id="aluno">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('ver_alunos_escola') }}"><span
                                        class="ml-1 item-text">Alunos por Escolas</span></a>
                            </li>

                        </ul>
                    </li>
                @endif


                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Encarregado')
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span>Estudantes</span>
                    </p>

                    <li class="nav-item dropdown">
                        <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-credit-card fe-16"></i>
                            <span class="ml-3 item-text">Matr??culas</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                            <li class="nav-item">
                                <a class="nav-link pl-3"
                                    href="{{ route('matricula.create', Auth::user()->id) }}"><span
                                        class="ml-1 item-text">Cadastrar Matr??cula</span></a>
                            </li>
                            @php
                                $id = Auth::user()->id;
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('/matricula') }}"><span
                                        class="ml-1 item-text">Listar
                                        Matr??culas
                                    </span></a>
                            </li>


                        </ul>
                    </li>



                @endif
                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Professor')
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span> Tarefas</span>
                    </p>
                    <li class="nav-item dropdown">

                        <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-file-plus fe-16"></i>
                            <span class="ml-3 item-text"> Tarefas</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="tables">

                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ url('tarefas/criar') }}"><span
                                            class="ml-1 item-text">Cadastrar Tarefa</span></a>
                                </li>
                            @endif

                            <li class="nav-item">
                                @php
                                    $id_user = Auth::User()->id;
                                @endphp
                                <a class="nav-link pl-3" href="{{ url('/tarefas') }}"><span
                                        class="ml-1 item-text">Listar
                                        Tarefas</span></a>
                            </li>

                        </ul>
                    <li class="nav-item dropdown">
                        <a href="#tables2" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-upload-cloud fe-16"></i>
                            <span class="ml-3 item-text"> Tarefas ?? Submeter</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="tables2">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('/Tarefas_Submetidas') }}"><span
                                        class="ml-1 item-text">Listar
                                        Tarefas ?? Submeter</span></a>
                            </li>

                        </ul>
                    </li>

                    </li>
                @endif


                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Professor')
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span> Mat??rias</span>
                    </p>

                    <li class="nav-item dropdown">
                        <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-edit-3 fe-16"></i>
                            <span class="ml-3 item-text"> Mat??rias</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ url('/materia') }}"><span
                                            class="ml-1 item-text">Cadastrar
                                            Mat??ria</span></a>
                                </li>

                            @endif

                            <!-- @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Aluno')
                                <li class="nav-item">
                                    <a class="nav-link pl-3"
                                        href="{{ route('materia.minhasMateria', ['id' => Auth::user()->id]) }}"><span
                                            class="ml-1 item-text">Minhas Mat??rias</span></a>
                                </li>
                            @endif -->

                            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Professor')
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('materia.buscasDiscicplina') }}"><span
                                            class="ml-1 item-text">Listar Mat??rias</span></a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif

                @if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno')
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span>Vida acad??mica</span>
                    </p>

                    <li class="nav-item dropdown">
                        <a href="#disciplinas" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-edit-3 fe-16"></i>
                            <span class="ml-3 item-text"> Aulas</span>
                        </a>

                        @isset($disciplinas2)
                            @foreach ($disciplinas2 as $item)
                                <ul class="collapse list-unstyled pl-4 w-100" id="disciplinas">
                                    <li class="nav-item">
                                        @isset($item->vc_disciplina)

                                            <a class="nav-link pl-3"
                                                href="{{ route('materia.aluno', ['id' => $item->id_classe_disciplinas]) }}"><span
                                                    class="ml-1 item-text">{{ $item->vc_disciplina }}</span></a>
                                        @endisset
                                    </li>
                                </ul>
                            @endforeach
                        @endisset
                    </li>


                    <li class="nav-item dropdown">
                        <a href="#tarefasII" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-file-plus fe-16"></i>
                            <span class="ml-3 item-text"> Tarefas</span>
                        </a>

                        @isset($disciplinas2)
                            @foreach ($disciplinas2 as $item)
                                <ul class="collapse list-unstyled pl-4 w-100" id="tarefasII">
                                    <li class="nav-item">
                                        @isset($item->vc_disciplina)

                                            <a class="nav-link pl-3"
                                                href="{{ route('alunos.minhaTarefa', ['id_classe_disciplina' => $item->id_classe_disciplinas]) }}"><span
                                                    class="ml-1 item-text">{{ $item->vc_disciplina }}</span></a>
                                        @endisset
                                    </li>
                                </ul>
                            @endforeach
                        @endisset
                    </li>
                @endif

                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Divers??o</span>
                </p>

                <li class="nav-item dropdown">
                    <a href="#quizzes" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle nav-link">
                        <i class="fe fe-edit-3 fe-16"></i>
                        <span class="ml-3 item-text"> Quizzes</span>
                    </a>

                            <ul class="collapse list-unstyled pl-4 w-100" id="quizzes">
                             

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('quizzes.criar')}}"><span
                                            class="ml-1 item-text">Criar</span></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('quizzes.listar')}}"><span
                                            class="ml-1 item-text">Listar</span></a>
                                </li>
                            </ul>
                      
                </li>


             
            @endif


                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span> Configura????es</span>
                    </p>


                    <li class="nav-item dropdown">
                        <a href="#anoLectivo" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-calendar fe-16"></i>
                            <span class="ml-3 item-text"> Anos Lectivos</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="anoLectivo">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('/admin/anolectivo/cadastrar') }}"><span
                                        class="ml-1 item-text">Cadastrar Ano Lectivo</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('/admin/anolectivo') }}"><span
                                        class="ml-1 item-text">Listar Anos Lectivos</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#escola" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-box fe-16"></i>
                            <span class="ml-3 item-text"> Escolas</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="escola">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('escolas/criar') }}"><span
                                        class="ml-1 item-text">Cadastrar
                                        Escola</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('escolas') }}"><span
                                        class="ml-1 item-text">Listar
                                        Escolas</span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#conf" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-list fe-16"></i>
                            <span class="ml-3 item-text"> Classes</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="conf">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('classes/criar') }}"><span
                                        class="ml-1 item-text">Cadastrar
                                        Classe</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('classes') }}"><span
                                        class="ml-1 item-text">Listar
                                        Classes</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#Disciplinas" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-book-open fe-16"></i>
                            <span class="ml-3 item-text"> Disciplinas</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="Disciplinas">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('disciplinas/criar') }}"><span
                                        class="ml-1 item-text">Cadastrar Disciplinas</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('disciplinas') }}"><span
                                        class="ml-1 item-text">Listar Disciplinas</span></a>
                            </li>
                        </ul>
                    </li>
                @endif




                <li class="nav-item dropdown">
                    <a href="#horario" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-clock fe-16"></i>
                        <span class="ml-3 item-text"> Hor??rios</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="horario">
                        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('/horarios/criar') }}"><span
                                        class="ml-1 item-text">Cadastrar
                                        Hor??rio</span></a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ url('/horarios') }}"><span
                                    class="ml-1 item-text">Listar
                                    Hor??rios</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                        <a href="#horariodeestudo" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-clock fe-16"></i>
                            <span class="ml-3 item-text"> Hor??rio de Estudo</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="horariodeestudo">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.HorarioDeEstudo.cadastrar')}}"><span
                                        class="ml-1 item-text">Cadastrar Hor??rio de Estudo</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.HorarioDeEstudo.listar') }}"><span
                                        class="ml-1 item-text">Listar Hor??rios de Estudo</span></a>
                            </li>
                        </ul>
                    </li>

                    @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')

                    <li class="nav-item dropdown">
                        <a href="#limite_sessao" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-edit-3 fe-16"></i>
                            <span class="ml-3 item-text"> Limite de Sess??o</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="limite_sessao">
                          
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ url('tempo_sessao/criar') }}"><span
                                            class="ml-1 item-text">Cadastrar
                                            tempo</span></a>
                                </li>

                       


                         
                                <li class="nav-item">
                                    <a class="nav-link pl-3" href="{{ route('tempo_sessao') }}"><span
                                            class="ml-1 item-text">Listar tempos</span></a>
                                </li>
                           

                        </ul>
                    </li>
                    @endif
                @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador=='Desenvolvedor')



                    <p class="text-muted nav-heading mt-4 mb-1">
                        <span> Registro de Atividades </span>
                    </p>

                    <li class="nav-item dropdown mb-5">
                        <a href="#logs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-database fe-16"></i>
                            <span class="ml-3 item-text"> Registro</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="logs">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ url('admin/logs/pesquisar') }}"><span
                                        class="ml-1 item-text">Lista
                                        de Registro</span></a>
                            </li>


                        </ul>
                    </li>
                @endif
            </ul>

            <br>
            {{-- <div class="btn-box w-100 mt-4 mb-1">
                <a type="button" href="#" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
                    <i class="fe fe-shopping-cart fe-12 mr-2"></i><span class="small">Manual de Utiliza????o</span>
                </a>
            </div> --}}
        </nav>
    </aside>

@endif
