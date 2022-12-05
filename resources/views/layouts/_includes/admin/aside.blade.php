@if (Auth::User()->vc_tipoUtilizador != 'Professor' && Auth::User()->vc_tipoUtilizador != 'Filho')
    <style>
        .dashboard .aside .nav .nav-item .nav-link span i {
            color: #3055A5 !important;
            ;
        }

        .dashboard .aside .nav .nav-item .nav-link {
            color: #838383 !important;
        }

        .nomeUtilizador {
            color: black;
        }

        h5 {
            color: black !important;
        }

    </style>
@else
    <style>
        .nomeUtilizador {
            color: #fff
        }

    </style>
@endif


@if (Auth::User()->vc_tipoUtilizador == 'Filho')
    <style>
        h5 {
            color: #EE6633 !important;
            ;
        }

        .cor-texto-dinamico {
            color: #EE6633 !important;
            ;
        }

        .titulo-aula {
            font: normal normal bold 29px/48px Archivo;
            letter-spacing: 0px;
            color: #3055A5 !important;
            opacity: 1;
        }

        .card-custom:hover {
            background-color: #EE6633 !important;
            color: white !important;
        }

    </style>
@elseif(Auth::User()->vc_tipoUtilizador == 'Professor')
    <style>
        h5 {
            color: #3055A5 !important;
        }

        .cor-texto-dinamico {
            color: #3055A5 !important;
        }

        .titulo-aula {
            font: normal normal bold 29px/48px Archivo;
            letter-spacing: 0px;
            color: #EE6633 !important;
            opacity: 1;
        }

        .card-custom:hover {
            background-color: #3055A5 !important;
            color: white !important;
        }

    </style>
@endif

@if (Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')
    <style>
        .card-custom:hover .sub-titulo-video,
        .card-custom:hover .detalhe-video,
        .card-custom:hover .icon-like,
        .card-custom:hover .count,
        .card-custom:hover .icon-dislike,
        .card-custom:hover .titulo-download {
            /* background-color: #EE6633; */
            color: white !important;
        }

        .card-custom:hover .download-container {

            background-color: #3055A5 !important;
        }

        .card-custom:hover .texto-verde {
            color: white !important;
        }

    </style>
@endif
@if (Auth::User()->vc_tipoUtilizador == 'Professor')
    <style>
        .card-custom:hover .download-container {

            background-color: #EE6633 !important;
        }

    </style>
@endif
{{-- @if (Auth::User()->vc_tipoUtilizador == 'Encarregado')
    <style>
        .card-custom:hover .download-container {

            background-color: #EE6633 !important;
        }

    </style>
@endif --}}

@if (Auth::User()->vc_tipoUtilizador == 'Filho')
    <style>
        .card-custom:hover .download-container {

            background-color: #3055A5 !important;
        }

    </style>
@endif
<aside
    class="aside closed min-vh-100 fixed-top  {{ Auth::User()->vc_tipoUtilizador != 'Professor' && Auth::User()->vc_tipoUtilizador != 'Filho' ? 'bg-white' : '' }}  {{ Auth::User()->vc_tipoUtilizador == 'Professor' ? 'bg-azul' : '' }} {{ Auth::User()->vc_tipoUtilizador == 'Filho' ? 'bg-laranja' : '' }}">

    <div class="brand p-3"> <a href="{{ route('xilonga') }}">

            @if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Professor')
                <img src="/site/assets/img/logo-admin.svg" alt="Logotipo">
            @else
                <img src="/site/assets/img/logo2.svg" alt="Logotipo">
            @endif
        </a>
    </div>
    <div class="brand p-3"> <span
            class="text-center {{ Auth::User()->vc_tipoUtilizador != 'Filho' && Auth::User()->vc_tipoUtilizador != 'Professor' ? 'text-dark' : 'text-white' }}">
            <strong>{{ Auth::User()->vc_primemiroNome }} {{ Auth::User()->vc_nome_meio }}
                {{ Auth::User()->vc_apelido }}</strong>
        </span>
    </div>



    <div
        class="menu-container position-relative d-flex  {{ Auth::User()->vc_tipoUtilizador == 'Professor' ? 'bg-azul' : '' }} {{ Auth::User()->vc_tipoUtilizador == 'Filho' ? 'bg-laranja' : '' }} ">
        <ul class="nav flex-column pr-3 w-100">
            <li class="nav-item my-3"> <a href="{{ route('home') }}"
                    class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }} ">

                    <span> <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-th-large px-2"></i>

                        Início</span>

                </a>
            </li>
            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Supervisor' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Chefe departamento provincial' || Auth::User()->vc_tipoUtilizador == 'Diretor Municipal')
                <li class="nav-item"> <a href="#"
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }} ">

                        Utilizadores

                    </a>
                </li>


                <li class="nav-item  mb-3"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#utilizadores" aria-expanded="false" aria-controls="utilizadores">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : '' }}  fas fa-user px-2"></i>
                            Utilizadores</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="utilizadores">

                        <li class="nav-item"> <a href="{{ url('admin/users/cadastrar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Adicionar
                                utilizador</a>
                        </li>
                        <li class="nav-item"> <a href="{{ url('admin/users/listar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                utilizadores</a>
                        </li>
                        {{-- <li class="nav-item"> <a href="{{ url('professores/') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                professores</a>
                        </li> --}}
                        <li class="nav-item"> <a href="{{ url('professores/escola') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Professores
                                e escolas</a>
                        </li>

                        <li class="nav-item"> <a href="{{ route('pais', Auth::user()->id) }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                encarregados</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('user.educandos') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                educandos</a>
                        </li>

                        <li class="nav-item"> <a href="{{ route('user.escrever') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Adicionar
                                educando</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Encarregado')
                <li class="nav-item  mb-3"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#educando" aria-expanded="false" aria-controls="educando">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-user-graduate px-2"></i>
                            Educando</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="educando">

                        <li class="nav-item"> <a href="{{ route('user.escrever') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Adicionar
                                educando</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('user.educandos') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                educandos</a>
                        </li>


                    </ul>
                </li>
            @endif

            @if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno')
                <li class="nav-item "> <a href="{{ route('home') }}"
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }} ">

                        <span class="ml-2">

                            {{ isset($matriculas_view->where('id', Auth::User()->id)->max()->vc_classe) ? $matriculas_view->where('id', Auth::User()->id)->max()->vc_classe . ' .ª Classe' : 'Sem classe' }}


                        </span>

                    </a>
                </li>
            @endif

            {{-- @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Encarregado')
                <li class="nav-item"> <a class="nav-link {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#Vincular-escola" aria-expanded="false"
                        aria-controls="Vincular-escola">

                        <span>
                            
                            Vincular a escola</span>



                        

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="Vincular-escola">
                        <li class="nav-item"> <a href="{{ url('/matricula') }}"
                                class="nav-link {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  py-1">Vinculados</a>
                        </li>


                    </ul>
                </li>
            @endif --}}

            @if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno')
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#aulas" aria-expanded="false" aria-controls="aulas">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-book-open px-2"
                                aria-hidden="true"></i> Disciplinas</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="aulas">


                        @isset($disciplinas2)
                            @foreach ($disciplinas2 as $item)
                                <li class="nav-item"> <a
                                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                                        data-toggle="collapse" href="#unidades{{ $item->id_disciplina }}"
                                        aria-expanded="false" aria-controls="unidades{{ $item->id_disciplina }}">

                                        <span> <i
                                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-book-open px-2"></i>{{ $item->vc_disciplina }}</span>



                                        <i
                                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                                    </a>

                                    <ul class="ml-4 list-unstyled collapse" id="unidades{{ $item->id_disciplina }}">
                                        <li class="nav-item">
                                            @foreach (unidades_disponivel($item->id_classe_disciplinas) as $unidade)
                                                <a class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  pl-3  "
                                                    href="{{ route('materia.aluno', ['id' => $item->id_classe_disciplinas, 'id_unidade' => $unidade->id]) }}"><span
                                                        class="ml-1 item-text">Tema {{ $unidade->vc_unidade }}


                                                    </span></a>
                                            @endforeach





                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        @endisset

                    </ul>
                </li>
            @endif
            @if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#desafios" aria-expanded="false" aria-controls="desafios">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  far fa-comment px-2"></i>
                            Jogos</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="desafios">

                        <li class="nav-item"> <a href="{{ url('desafios/quizzes/escolha/disciplinas') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Jogos
                                didáticos</a>
                        </li>

                    </ul>
                </li>
            @endif


            {{-- start Sessão professor --}}

            @if (Auth::User()->vc_tipoUtilizador == 'Professor')


                <li class="nav-item "> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }} ">

                        <span class="ml-2">
                            Ensino
                            @foreach (ciclos_professores(Auth::User()->id) as $item)
                                @if ($loop->index == 1)
                                    e
                                @endif
                                {{ $item }}
                            @endforeach

                        </span>

                    </a>
                </li>


                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#aulas" aria-expanded="false" aria-controls="aulas">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-book-open px-2"></i>
                            Disciplinas</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="aulas">

                        @if (disciplinas_lecionadas(Auth::User()->id))


                            @foreach (disciplinas_lecionadas(Auth::User()->id) as $item)
                                <li class="nav-item"> <a
                                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-start justify-content-between"
                                        data-toggle="collapse" href="#unidades{{ $item->id_c_d }}"
                                        aria-expanded="false" aria-controls="unidades{{ $item->id_c_d }}">

                                        <span> <i
                                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-book-open px-2"></i>
                                            {{ Str::limit($item->vc_disciplina, 16, '...') }} -
                                            {{ $item->vc_classe }}.ª Classe</span>



                                        <i
                                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                                    </a>

                                    <ul class="ml-4 list-unstyled collapse" id="unidades{{ $item->id_c_d }}">
                                        <li class="nav-item">
                                            @foreach (unidades_disponivel($item->id_c_d) as $unidade)
                                                <a class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  pl-3  "
                                                    href="{{ route('materia.aluno', ['id' => $item->id_c_d, 'id_unidade' => $unidade->id]) }}"><span
                                                        class="ml-1 item-text">Tema {{ $unidade->vc_unidade }}


                                                    </span></a>
                                            @endforeach





                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        @endif


                    </ul>
                </li>


                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#tarefasEducando" aria-expanded="false"
                        aria-controls="tarefasEducando">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-briefcase px-2"></i>
                            Tarefas</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="tarefasEducando">


                        @if (disciplinas_lecionadas(Auth::User()->id))
                            @foreach (disciplinas_lecionadas(Auth::User()->id) as $item)
                                <li class="nav-item"> <a
                                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                                        href="{{ route('alunos.minhaTarefa', ['id_classe_disciplina' => $item->id_c_d]) }}">

                                        <span> <i
                                                class="fas fa-briefcase px-2"></i>{{ Str::limit($item->vc_disciplina, 16, '...') }}
                                            -
                                            {{ $item->vc_classe }}.ª Classe</span>



                                        <i
                                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                                    </a>


                                </li>
                            @endforeach
                        @endif

                    </ul>
                </li>
            @endif














            @if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno')
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#tarefasEducando" aria-expanded="false"
                        aria-controls="tarefasEducando">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-briefcase px-2"></i>
                            Tarefas</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="tarefasEducando">


                        @isset($disciplinas2)
                            @foreach ($disciplinas2 as $item)
                                <li class="nav-item"> <a
                                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                                        href="{{ route('alunos.minhaTarefa', ['id_classe_disciplina' => $item->id_classe_disciplinas]) }}">

                                        <span> <i
                                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-briefcase px-2"></i>{{ $item->vc_disciplina }}</span>



                                        <i
                                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                                    </a>


                                </li>
                            @endforeach
                        @endisset

                    </ul>
                </li>
            @endif
            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#Matérias" aria-expanded="false" aria-controls="Matérias">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-briefcase px-2"></i>
                            Conteúdo</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="Matérias">
                        <li class="nav-item"> <a href="{{ url('/materia') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Adicionar
                                conteúdo</a>
                        </li>

                        <li class="nav-item"> <a href="{{ route('materia.buscasDiscicplina') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                conteúdo</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#tarefas" aria-expanded="false" aria-controls="tarefas">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-briefcase px-2"></i>
                            Tarefas</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="tarefas">
                        <li class="nav-item"> <a href="{{ url('tarefas/criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Adicionar
                                tarefa</a>
                            <a href="{{ url('/tarefas') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                tarefas</a>

                            <a href="{{ url('/Tarefas_Submetidas') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Tarefas
                                à submeter</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
                <li class="nav-item"> <a href="#"
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }} ">

                        jogos

                    </a>
                </li>


                <li class="nav-item "> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#questao" aria-expanded="false" aria-controls="questao">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-question px-2"></i>
                            Pergunta</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="questao">
                        <li class="nav-item"> <a href="{{ route('quizzes.questoes.criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Adicionar
                                pergunta</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('quizzes.questoes') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                perguntas</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                <li class="nav-item "> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#nivel" aria-expanded="false" aria-controls="nivel">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-level-up-alt px-2"></i>
                            Nível</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="nivel">
                        <li class="nav-item"> <a href="{{ route('quizzes.niveis.criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Adicionar
                                nível</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('quizzes.niveis') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                niveis</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item "> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#categoria" aria-expanded="false" aria-controls="categoria">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-layer-group px-2"></i>
                            Categoria</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="categoria">
                        <li class="nav-item"> <a href="{{ route('quizzes.categorias.criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Adicionar
                                categoria</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('quizzes.categorias') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                categorias</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
                <li class="nav-item"> <a href="#"
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }} ">

                        Configuração

                    </a>
                </li>
            @endif

            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#Anoslectivos" aria-expanded="false" aria-controls="Anoslectivos">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-calendar px-2"></i>Anos
                            lectivos</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="Anoslectivos">
                        <li class="nav-item"> <a href="{{ url('/admin/anolectivo/cadastrar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Adicionar
                                anos</a>
                        </li>

                        <li class="nav-item"> <a href="{{ url('/admin/anolectivo') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                anos lectivos </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#escola" aria-expanded="false" aria-controls="escola">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-school px-2"></i>
                            Escola</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="escola">
                        <li class="nav-item"> <a href="{{ url('escolas/criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Adicionar
                                escola</a>
                        </li>

                        <li class="nav-item"> <a href="{{ url('escolas') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                escolas</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#classe" aria-expanded="false" aria-controls="classe">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-book-reader px-2"></i>Classe</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>


                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="classe">
                        <li class="nav-item"> <a href="{{ url('classes/criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Adicionar
                                classe</a>
                        </li>

                        <li class="nav-item"> <a href="{{ url('classes') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                classes</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#disciplina" aria-expanded="false" aria-controls="disciplina">

                        <span><i class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-book-open px-2"
                                aria-hidden="true"></i>Disciplina</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="disciplina">
                        <li class="nav-item"> <a href="{{ url('disciplinas/criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Adicionar
                                disciplina</a>
                        </li>
                        <li class="nav-item"> <a href="{{ url('disciplinas') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">listar
                                disciplinas</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#normativos-professor" aria-expanded="false"
                        aria-controls="normativos-professor">

                        <span><i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-ruler px-2"></i></i>Acervo</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="normativos-professor">
                        <li class="nav-item"> <a href="{{ url('normativos-professor/criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Adicionar
                                documento</a>
                        </li>
                        <li class="nav-item"> <a href="{{ url('normativos-professor/') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">listar
                                documentos</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#unidades" aria-expanded="false" aria-controls="unidades">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fab fa-unity px-2"></i>
                            Tema</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="unidades">
                        <li class="nav-item"> <a href="{{ url('unidades/criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Adicionar
                                tema</a>
                        </li>
                        <li class="nav-item"> <a href="{{ url('unidades') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">listar
                                temas</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#horiario" aria-expanded="false" aria-controls="horiario">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  far fa-calendar-alt px-2"></i>
                            Horários</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="horiario">
                        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                            <li class="nav-item"> <a href="{{ url('/horarios/criar') }}"
                                    class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Adicionar
                                    horário</a>
                            </li>
                        @endif
                        <li class="nav-item"> <a href="{{ url('/horarios') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Listar
                                horários</a>
                        </li>

                    </ul>
                </li>
            @endif

            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                {{-- <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#horiariodeEstudo" aria-expanded="false"
                        aria-controls="horiariodeEstudo">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  far fa-calendar-alt px-2"></i>
                            Horário de estudo</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="horiariodeEstudo">
                        <li class="nav-item"> <a href="{{ route('admin.HorarioDeEstudo.cadastrar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Adicionar
                                horário de estudo</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('admin.HorarioDeEstudo.listar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Listar
                                horário de estudo</a>
                        </li>
                    </ul>
                </li> --}}
            @endif


            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#dependencia_professor" aria-expanded="false"
                        aria-controls="dependencia_professor">

                        <span><i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-recycle px-2"></i>
                            Agentes do MED</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="dependencia_professor">
                        <li class="nav-item"> <a href="{{ route('dependencias.professor.criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Adicionar
                                agente</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('admin.users.excel.importar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Importar
                                agentes</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('dependencias.professor') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">
                                Listar agentes</a>
                        </li>
                    </ul>
                </li>
            @endif
            {{-- <li class="nav-item"> <a class="nav-link {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  d-flex align-items-center justify-content-between"
                    data-toggle="collapse" href="#tema" aria-expanded="false" aria-controls="tema">

                    <span> <i class=" {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  fas fa-paperclip px-2"></i> Tema</span>



                    <i class=" {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  fas arrow-icon"></i>

                </a>
                <ul class="ml-4 list-unstyled collapse" id="tema">
                    <li class="nav-item"> <a href="#" class="nav-link {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}   py-1">Adicionar Utilizador</a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item"> <a class="nav-link {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  d-flex align-items-center justify-content-between"
                    data-toggle="collapse" href="#termos" aria-expanded="false" aria-controls="termos">

                    <span> <i class=" {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  fas fa-paperclip px-2"></i> Termos</span>



                    <i class=" {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  fas arrow-icon"></i>

                </a>
                <ul class="ml-4 list-unstyled collapse" id="termos">
                    <li class="nav-item"> <a href="#" class="nav-link {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}   py-1">Adicionar Utilizador</a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item"> <a class="nav-link {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  d-flex align-items-center justify-content-between"
                    data-toggle="collapse" href="#horarios" aria-expanded="false" aria-controls="horarios">

                    <span> <i class=" {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  far fa-calendar-alt px-2"></i> Horários</span>





                    <i class=" {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}  fas arrow-icon"></i>

                </a>
                <ul class="ml-4 list-unstyled collapse" id="horarios">
                    <li class="nav-item"> <a href="#" class="nav-link {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}   py-1">Adicionar Utilizador</a>
                    </li>
                </ul>
            </li> --}}
            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                {{-- <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#limiteDeSessao" aria-expanded="false"
                        aria-controls="limiteDeSessao">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-unlock px-2"></i>
                            Limite de Sessão</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="limiteDeSessao">
                        <li class="nav-item"> <a href="{{ url('tempo_sessao/criar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Adicionar
                                tempo</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('tempo_sessao') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Listar
                                tempos</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#relatorio" aria-expanded="false" aria-controls="relatorio">

                        <span> <i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-chart-pie px-2"></i>
                            Relatório</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="relatorio">
                        <li class="nav-item"> <a href="{{ route('relatorio.aluno.classe.pesquisar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Alunos
                                por classe</a>
                        </li>
                        {{-- <li class="nav-item"> <a href="{{ route('ver_quantidade_tarefas_submetidas') }}"
                                class="nav-link {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'':'text-dark'}}   py-1">Tarefas submetidas</a>
                        </li> --}}

                        <li class="nav-item"> <a href="{{ route('aluno.provincia.pesquisar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Alunos
                                por províncias</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('relatorio.aluno.municipio.pesquisar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Alunos
                                por municípios</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('relatorio.aluno.escola.pesquisar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}   py-1">Alunos
                                por escolas</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item"> <a href="#"
                    class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }} ">
                    Fale connosco

                </a>
            </li>


            <li class="nav-item"> <a
                    class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                    data-toggle="collapse" href="#comentario" aria-expanded="false" aria-controls="comentario">

                    <span><i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-database px-2"></i>
                        Comentários</span>



                    <i
                        class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                </a>
                <ul class="ml-4 list-unstyled collapse" id="comentario">


                    <li class="nav-item"> <a href="{{ route('admin.comentarios') }}"
                            class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                            comentários </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"> <a
                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                data-toggle="collapse" href="#faleconnosco" aria-expanded="false" aria-controls="faleconnosco">

                <span><i
                        class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-database px-2"></i>
                    Fale connosco</span>



                <i
                    class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

            </a>
            <ul class="ml-4 list-unstyled collapse" id="faleconnosco">


                <li class="nav-item"> <a href="{{ route('admin.fale.connosco') }}"
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                        fale connosco </a>
                </li>
            </ul>
        </li>
                <li class="nav-item"> <a href="#"
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }} ">
                        Registro de atividades

                    </a>
                </li>


                <li class="nav-item"> <a
                        class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#registros" aria-expanded="false" aria-controls="registros">

                        <span><i
                                class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas fa-database px-2"></i>
                            Registro</span>



                        <i
                            class=" {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="registros">


                        <li class="nav-item"> <a href="{{ url('admin/logs/pesquisar') }}"
                                class="nav-link {{ Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' ? '' : 'text-dark' }}  py-1">Listar
                                registros </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</aside>
