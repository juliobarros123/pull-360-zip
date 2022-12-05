@extends('layouts._includes.admin.app')
@section('titulo', 'Home')
@section('conteudo')
    <style>
        .saudacao {
            height: 84px;
            font: normal normal bold 78px/84px Archivo;
            letter-spacing: 0px;
            color: #3055A5;
            opacity: 1;
            font-size: 450%;
        }

        .sub-saudacao {
            /* top: 267px; */
            height: 40px;
            margin-top: 0%;
            text-align: left;
            font: normal normal 100 25px/35px Archivo;

            letter-spacing: 0px;
            color: #EE6633;
            opacity: 1;
            font-size: 130%;
        }

        /* .fundo {
                            background-repeat: no-repeat;
                          
                            background-position: ;
                            background-position-y: bottom;
                            height: 600px;
                            background-color: orange;
                            background-size: 70% 70%;
                        } */
        .fundo {
            width: 100%;
            height: 800px;
            background-repeat: no-repeat;
            background-position: center 72%;
            background-size: 70% 80%;
        }

    </style>

    <div class="page-wrapper p-2 p-md-5 ">
        @if (Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno')
            <div style="margin: 0 -1em;background-image:  {{ Auth::User()->vc_tipoUtilizador == 'Professor' ? 'url(site/assets/img/prof-aluno/prof.svg)' : 'url(site/assets/img/prof-aluno/img.svg)' }} "
                class=" colored-cards   fundo">
                @if (Auth::User()->vc_tipoUtilizador == 'Professor')
                    <h1 class="saudacao w-100 text-center" style="color: #EE6633">Seja bem-vindo, Caro professor!</h1>
                    {{-- <p class="sub-saudacao w-100 text-center">Pronto para mais uma jornada de Aprendizado?</p> --}}
                @else
                    <h1 class="saudacao  text-center">Que bom ter-te de volta!</h1>
                    <p class="sub-saudacao  text-center">Pronto para mais uma jornada de Aprendizado?</p>
                @endif

            </div>
        @endif

        <div class="p-3">





            @if (Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
                <div style="margin: 0 -1em"
                    class="d-flex  flex-wrap colored-cards justify-content-between align-items-center">
                    <div class="col mb-3">
                        <div class="bg-white shadow rounded p-3">
                            <div class="d-flex">
                                <div
                                    class="cool-green-bg rounded p-2 mr-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-list h4 my-0 text-cool-green"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Total de teleaulas</div>
                                    <div class="h4 my-0">{{ ttl_teleaulas() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="bg-white shadow rounded p-3">
                            <div class="d-flex">
                                <div class="cool-red-bg rounded p-2 mr-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-list h4 my-0 text-cool-red"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Total de arquivos pdf</div>
                                    <div class="h4 my-0">{{ ttl_pdfs() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col mb-3">
                        <div class="bg-white shadow rounded p-3">
                            <div class="d-flex">
                                <div class="cool-blue-bg rounded p-2 mr-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-list h4 my-0 text-cool-blue"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Total de matérias</div>
                                    <div class="h4 my-0">{{ ttl_aulas() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="bg-white shadow rounded p-3">
                            <div class="d-flex">
                                <div
                                    class="cool-yellow-bg rounded p-2 mr-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-list h4 my-0 text-cool-yellow"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Total de tarefas</div>
                                    <div class="h4 my-0">{{ ttl_tarefas() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>





                <div style="margin: 0 -1em" class="d-flex flex-wrap mt-3">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="bg-white shadow rounded p-4 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Matérias por disciplina</div>
                                {{-- <div class="form-group my-0">
                                    <select class="form-control" id="cidade">
                                        <option selected>Luanda</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="d-flex flex-wrap justify-content-center align-items-center h-md-100">
                                <div class="col-12 col-md-6 px-1 mb-2">
                                    <div style="height: 200px; width: 100%;">
                                        <canvas id="alunosProvincia"></canvas>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 px-1 mb-2" id="alunosProvinciaLabels"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="bg-white shadow rounded p-4 h-100">
                            <div class="mb-5">Matérias por classe</div>
                            <canvas id="alunosClasse" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Supervisor' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno')
                <h5 class="mb-4">
                    {{ Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno' ? '' : 'Dados estatísticos' }}
                </h5>
            @endif

            @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Supervisor' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                <div style="margin: 0 -1em"
                    class="d-flex  flex-wrap colored-cards justify-content-between align-items-center">
                    <div class="col mb-3">
                        <div class="bg-white shadow rounded p-3">
                            <div class="d-flex">
                                <div
                                    class="cool-green-bg rounded p-2 mr-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-list h4 my-0 text-cool-green"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Total de Utilizadores</div>
                                    <div class="h4 my-0">{{ $ttl_users }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="bg-white shadow rounded p-3">
                            <div class="d-flex">
                                <div class="cool-red-bg rounded p-2 mr-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-list h4 my-0 text-cool-red"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Total de Professores</div>
                                    <div class="h4 my-0">{{ $ttl_professores }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="bg-white shadow rounded p-3">
                            <div class="d-flex">
                                <div class="cool-blue-bg rounded p-2 mr-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-list h4 my-0 text-cool-blue"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Total de Educandos</div>
                                    <div class="h4 my-0">{{ $ttl_filhos }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="bg-white shadow rounded p-3">
                            <div class="d-flex">
                                <div
                                    class="cool-yellow-bg rounded p-2 mr-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-list h4 my-0 "></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Total de Encarregados</div>
                                    <div class="h4 my-0">{{ $ttl_encarregados }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-3">
                        <div class="bg-white shadow rounded p-3">
                            <div class="d-flex">
                                <div
                                    class="cool-yellow-bg rounded p-2 mr-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-list h4 my-0 text-cool-orange"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Total de Escolas</div>
                                    <div class="h4 my-0">{{ $ttl_escolas }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <div style="margin: 0 -1em" class="d-flex flex-wrap mt-3">
            <div class="col-12 col-md-6 mb-4">
                <div class="bg-white shadow rounded p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>Alunos por Províncias</div>
                        {{-- <div class="form-group my-0">
                                    <select class="form-control" id="cidade">
                                        @foreach ($objectAlunosPorí['í'] as $item)
                                        <option value="{{$item}}">{{ $item }}</option>
                                        @endforeach
                                       
                                    </select>
                                </div> --}}
                    </div>
                    <div class="d-flex flex-wrap justify-content-center align-items-center h-md-100">
                        <div class="col-12 col-md-6 px-1 mb-2">
                            <div style="height: 200px; width: 100%;">
                                <canvas id="alunosProvincia"></canvas>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 px-1 mb-2" id="alunosProvinciaLabels"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <div class="bg-white shadow rounded p-4 h-100">
                    <div class="mb-5">Alunos por Classe</div>
                    <canvas id="alunosClasse" style="height: 300px; width: 100%;"></canvas>
                </div>
            </div>
        </div>
        @endif
        @if (Auth::User()->vc_tipoUtilizador == 'Encarregado')
            <h5 class="mb-4">
                Painel do encarregado
            </h5>
            <div class="col-12 col-md-12 col-xl-12 mb-4" >

                <div class="row">
                    <div class="col-md-9" style="background-color: #F4F4F4; ">
                        <div class="bg-white shadow rounded ">

                          
                            <div class="shadow p-3 d-flex justify-content-between align-items-center border-bottom py-3 row">
                                <div class="col-md-1">
                                    <img style="width: 46px;
                                      height: 46px;
                                      

                                      
                                      " src="http://localhost:8000/storage/userPhoto/17064920220524628d10a939edc.jpg" alt="">
                                </div>

                                <div class="col-md-3">


                                    <span class="text-center text-muted small" style="
                                    font: normal normal bold 16px/17px Archivo;
                                    letter-spacing: 0px;
                                    color: #838383;
                                    opacity: 1;">


                                        António Paulo


                                    </span>
                                </div>
                                <div class="col-md-4">


                                    <span class="text-left text-muted small ">


                                        6ª Classe/ Istituto medio técnico

                                    </span>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">


                                    <span class="text-left text-muted small">


                                        65 Aulas

                                    </span>
                                </div>
                             
                                <div class="col-md-2 d-flex justify-content-end flex-column" style="height: 14px;">
                                    <span class="text-right text-muted small " >


                                        Actividades
        
                                    </span>
                                    <div class=" d-flex justify-content-end" >
                                        <span class="text-center text-muted small" style="width: 18px;
                                        height: 18px;
                                        /* UI Properties */
                                        background: #EDAA28 0% 0% no-repeat padding-box;
                                        opacity: 1;
                                        border-radius: 10px;
                                        
                                        ">
    
    
                                        2
    
                                        </span>
                                    </div>

                                    
                                </div>
                             
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-md-3 " style="background-color: #F4F4F4;">
                        <div class="bg-white shadow rounded ">


                            <div
                                class="shadow p-4 d-flex justify-content-between align-items-center border-bottom py-3 row">
                               

                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        @endif  



        @if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno' || Auth::User()->vc_tipoUtilizador == 'Professor')
            <div style="margin: 0 -1em" class="d-flex w-100 flex-wrap mt-3">

                {{-- <div class="col-12 col-md-6 col-xl-4 mb-4">
                        <div class="mb-4 font-weight-bold">Desafio</div>
                        <div class="bg-white shadow rounded p-4">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <div class="small font-weight-bold">Aula nº 1</div>
                                    <div class="small font-weight-bold">05 de Fev</div>
                                </div>
                                <hr class="mt-0 mb-2">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="small text-muted">Participação em aula</div>
                                    <div class=" small text-warning">120 Pontos</div>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="small text-muted">Participação em aula</div>
                                    <div class=" small text-warning">150 Pontos</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <div class="small font-weight-bold">Aula nº 2</div>
                                    <div class="small font-weight-bold">05 de Fev</div>
                                </div>
                                <hr class="mt-0 mb-2">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="small text-muted">Participação em aula</div>
                                    <div class=" small text-warning">185 Pontos</div>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="small text-muted">Participação em aula</div>
                                    <div class=" small text-warning">120 Pontos</div>
                                </div>
                            </div>
                            <div>
                                <img src="https://uxwing.com/wp-content/themes/uxwing/download/24-sport-and-awards/trophy.png"
                                    width="60" alt="" class="d-block mx-auto my-1">
                                <div class="font-weight-bold text-center">Parabéns!</div>
                                <div class="font-weight-bold text-center">Continue Assim.</div>
                            </div>
                        </div>
                    </div> --}}
                @if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno')
                    <div class="col-12 col-md-12 col-xl-12 mb-4" style="margin-top: -1.2em;">
                        <h5 class="mb-4">Aulas em curso</h5>
                        <div class="bg-white shadow rounded ">
                            @foreach ($materias as $item)
                                <div
                                    class="shadow p-4 d-flex justify-content-between align-items-center border-bottom py-3">
                                    <div> <i class="fas fa-film"></i>
                                        <span class="ml-3 text-muted small">

                                            {{ $item->id }}ª Aula/{{ $item->vc_materia }}

                                        </span>
                                    </div>
                                    <div>
                                        <a style="font-size: 10px;"
                                            href="{{ route('materia.aluno', ['id' => $item->it_id_classeDisciplina, 'id_unidade' => $item->it_id_unidadeMateria]) }}"
                                            class="btn btn-secondary-reverse rounded-pill btn-sm px-2">CONTINUAR A
                                            VER</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if (Auth::User()->vc_tipoUtilizador == 'Professor')
                    <div class="col-12 col-md-12 col-xl-12 mb-4">
                        <div class="schedule">
                            {{-- <div role="button" class="item border-bottom active px-4 py-3 d-flex justify-content-between align-items-center">
                            <div>
                                <div class="h4 font-weight-bold text-uppercase text-black mb-0">Semana 4</div>
                                <div class="text-black small font-weight-light border-bottom d-inline pb-1">25 Fev a 1 Mar</div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-purple mr-2"></div>
                                    <div class="text-black small font-weight-light">4 TPC</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-danger mr-2"></div>
                                    <div class="text-black small font-weight-light">2 Faltas</div>
                                </div>
                            </div>
                        </div> --}}
                            @php
                                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                date_default_timezone_set('America/Sao_Paulo');
                                
                            @endphp
                            @foreach ($diasAulas as $item)
                                <div role="button"
                                    class="item border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="h4 font-weight-bold text-uppercase text-black mb-0">
                                            {{ $item->vc_dia }}</div>
                                        <div class="text-black small font-weight-light border-bottom d-inline pb-1">1 a
                                            {{ date('d') }} de
                                            {{ strftime('%A, %d de %B de %Y', strtotime('today')) }}</div>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-purple mr-2"></div>
                                            <div class="text-black small font-weight-light">{{ $item->tll }} aulas
                                            </div>
                                        </div>
                                        {{-- <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-danger mr-2"></div>
                                    <div class="text-black small font-weight-light">2 Faltas</div>
                                </div> --}}
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div role="button" class="item border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                            <div>
                                <div class="h4 font-weight-bold text-uppercase text-black mb-0">Semana 6</div>
                                <div class="text-black small font-weight-light border-bottom d-inline pb-1">11 a 15 de Mar</div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-purple mr-2"></div>
                                    <div class="text-black small font-weight-light">4 TPC</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-danger mr-2"></div>
                                    <div class="text-black small font-weight-light">2 Faltas</div>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <div class="calendar rounded bg-white px-3 py-4 col-12 col-md-12 col-xl-12 mb-4">
                        <div class="d-flex justify-content-between align-items-center" style="background-color: #3055A5;
                                                        box-shadow: 0px 25px 30px #00000015;">
                            <div>
                                <div class="h5 mb-0 text-uppercase font-weight-bold text-white ">Últimas aulas</div>
                                {{-- <div class="small  font-weight-light text-dark">25 de Fev a 1de Mar</div> --}}
                            </div>
                            <div>
                                {{-- <i class="fas fa-chevron-right" aria-hidden="true"></i> --}}
                            </div>
                        </div>
                        <hr class="my-1">
                        <div class=" table-responsive">
                            <table class="table table-sm mb-0">
                                <thead class="item active">
                                    <tr>
                                        <td scope="col">
                                            <div class="d-inline-block" role="button">Disciplina</div>
                                        </td>
                                        <td scope="col">
                                            <div class="d-inline-block" role="button">Título</div>
                                        </td>
                                        {{-- <td scope="col">
                                        <div class="d-inline-block" role="button">Hora de início</div>
                                    </td>
                                    <td scope="col">
                                        <div class="d-inline-block" role="button">Hora de término</div>
                                    </td>
                                    <td scope="col">
                                        <div class="d-inline-block" role="button">Dia da semana</div>
                                    </td> --}}

                                        <td scope="col">
                                            <div class="d-inline-block" role="button">Ano lectivo</div>
                                        </td>
                                        <td scope="col">
                                            <div class="d-inline-block" role="button">Acção</div>
                                        </td>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materias as $materia)
                                        <tr>
                                            <td scope="row">
                                                <div class="d-inline-block">{{ $materia->vc_disciplina }}</div>
                                            </td>
                                            <td scope="row">
                                                <div class="d-inline-block">{{ $materia->vc_materia }}</div>
                                            </td>
                                            {{-- <th>
                                        <div class="d-inline-block">{{ $materia->vc_hora_inicio }}</div>
                                    </th>
                                    <th>
                                        <div class="d-inline-block">{{ $materia->vc_hora_fim }}</div>
                                    </th>
                                    <th>
                                        <div class="d-inline-block">{{ $materia->vc_dia }}</div> --}}
                                            </th>
                                            <th>
                                                <div class="d-inline-block">
                                                    {{ $materia->ya_inicio }}/{{ $materia->ya_fim }}</div>
                                            </th>
                                            <th>
                                                <div class="d-inline-block"> <a
                                                        href="{{ route('materia.aluno', ['id' => $materia->it_id_classeDisciplina, 'id_unidade' => $materia->it_id_unidadeMateria]) }}"
                                                        class="btn-sm btn-secondary-reverse rounded-pill text-decoration-none  ">
                                                        VER</a></div>
                                            </th>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{-- <hr class="my-1">
                    <div class="small  font-weight-light text-dark">Relatório Semanal</div>
                    <div class="d-flex mt-2">
                        <div class="d-flex align-items-center mr-3 ">
                            <div class="rounded-circle bg-purple mr-2"></div>
                            <div class="text-black small font-weight-light">4 TPC</div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-danger mr-2"></div>
                            <div class="text-black small font-weight-light">2 Faltas</div>
                        </div>
                    </div> --}}
                    </div>
                @endif
                {{-- <div class="col-12 col-md-6 col-xl-4 mb-4">
                        <div class="mb-4">Horários</div>
                        <div class="calendar rounded bg-white px-3 py-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fas fa-book-open text-purple"></i>
                                    <span class="small  text-muted ml-2">Aulas</span>
                                </div>
                                <div class="d-flex align-items-center"> <span
                                        class="small font-weight-bold mr-2">Sexta-feira</span><i
                                        class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                            <hr class="my-1">
                            <div class=" table-responsive">
                                <table class="table table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <td scope="col">
                                                <div class="d-inline-block">Tempo</div>
                                            </td>
                                            <td scope="col">
                                                <div class="d-inline-block">1º Tempo</div>
                                            </td>
                                            <td scope="col">
                                                <div class="d-inline-block">2º Tempo</div>
                                            </td>
                                            <td scope="col">
                                                <div class="d-inline-block">3º Tempo</div>
                                            </td>
                                            <td scope="col">
                                                <div class="d-inline-block">4º Tempo</div>
                                            </td>
                                            <td scope="col">
                                                <div>5º Tempo</div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">
                                                <div class="d-inline-block">Disciplina</div>
                                            </td>
                                            <th>
                                                <div class="d-inline-block">L. Port</div>
                                            </th>
                                            <th>
                                                <div class="d-inline-block">L. Port</div>
                                            </th>
                                            <th>
                                                <div class="d-inline-block">Edu. Mus</div>
                                            </th>
                                            <th>
                                                <div class="d-inline-block">Edu. Fis</div>
                                            </th>
                                            <th>
                                                <div class="d-inline-block text-danger">Edu. Fis</div>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
            </div>
        @endif

        @if (Auth::User()->vc_tipoUtilizador == 'Professor')


            <h5 class="mb-4">
                Acervo
            </h5>
            <div class="row">
                @foreach ($normativos as $normativo)
                    <div class="col-md-4 mb-3 ">
                        <div class="bg-white shadow rounded p-3">
                            <div class="d-flex">
                                <div
                                    class="cool-blue-bg rounded p-2 mr-2 d-flex align-items-center justify-content-center">
                                    <a class="pr-3" href="{{ url("storage/{$normativo->vc_caminho}") }}"
                                        download>
                                        <img src="site/assets/img/pdf.jpg" alt="icon">

                                    </a>
                                </div>
                                <div>

                                    <div class="h5 font-weight-bold text-uppercase">{{ $normativo->vc_normativo }}</div>
                                    <div class="text-uppercase small">{{ $normativo->vc_descricao }}</div>
                                    <div class="text-uppercase small">Data de publicação:
                                        {{ date('d-m-Y', strtotime($normativo->dt_data_publicao)) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="second-section-container p-4 p-md-5">
                    <div class="container-custom px-md-5">
                        <div class="row">
                            <div class="col-md-12">
                               
                                   
                                   
                                </div> <div class="py-3">
                                    <ul class="unstyled-list">
        
                                        <li class="d-flex mb-5">
                                            <a class="pr-3" href="{{ route('pedfView', ['parametro' => 'lei']) }}">
                                                <img src="site/assets/img/pdf.jpg" alt="icon">
                                               
                                            </a>
                                            <div>
                                                <div class="h5 font-weight-bold text-uppercase">Lei de Bases</div>
                                                <div class="text-uppercase small">Lei de Bases do Sistema de Educação e Ensino</div>
                                            </div>
                                        </li>
                                   
        
                                          
                                      
                                    </ul>
        
        
                                </div>
                                
                                  
        
                            </div>
                           
                        </div>
                    </div>
                </div> --}}
                @endforeach
            </div>

        @endif
    </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('conta_criada'))
        <script>
            Swal.fire(
                'Seja bem-vindo!',
                '',
                'success'
            )
        </script>
    @endif

@endsection
