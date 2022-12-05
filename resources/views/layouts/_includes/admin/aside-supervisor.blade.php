

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
<aside class="aside closed min-vh-100 fixed-top bg-white ">
    <div class="brand p-3"> <a href="{{ route('xilonga') }}"><img src="/site/assets/img/logo.svg"
                alt="Logotipo"></a>
    </div>
    <div class="brand p-3"> <span class="text-center">{{ Auth::User()->vc_tipoUtilizador != 'Filho' ? '' : '' }}
            <strong>{{ Auth::User()->vc_primemiroNome }} {{ Auth::User()->vc_nome_meio }}
                {{ Auth::User()->vc_apelido }}</strong>
        </span>
    </div>



    <div class="menu-container position-relative d-flex ">
        <ul class="nav flex-column pr-3 w-100">
            <li class="nav-item my-3"> <a href="{{ route('home') }}" class="nav-link">

                    <span> <i class="fas fa-th-large px-2"></i>

                        Início</span>

                </a>
            </li>
          
                <li class="nav-item"> <a href="#" class="nav-link">

                        Utilizadores

                    </a>
                </li>


                <li class="nav-item active mb-3"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#utilizadores" aria-expanded="false" aria-controls="utilizadores">

                        <span> <i class="fas fa-user px-2"></i> Utilizadores</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="utilizadores">
                        
                      
                        <li class="nav-item"> <a href="{{ url('admin/users/listar') }}"
                                class="nav-link py-1">Listar utilizadores</a>
                        </li>
                        <li class="nav-item"> <a href="{{ url('professores/') }}" class="nav-link py-1">Listar
                                professores</a>
                        </li>
                        <li class="nav-item"> <a href="{{ url('professores/professorEscola') }}"
                                class="nav-link py-1">Professores e escolas</a>
                        </li>

                        <li class="nav-item"> <a href="{{ route('pais', Auth::user()->id) }}"
                                class="nav-link py-1">Listar encarregados</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('user.educandos') }}"
                                class="nav-link py-1">Listar educandos</a>
                        </li>

                       
                    </ul>
                </li>


          
                <li class="nav-item active mb-3"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#educando" aria-expanded="false" aria-controls="educando">

                        <span> <i class="fas fa-user-graduate px-2"></i> Educando</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="educando">

                      
                        <li class="nav-item"> <a href="{{ route('user.educandos') }}"
                                class="nav-link py-1">Listar educandos</a>
                        </li>

                    
                    </ul>
                </li>
      

      

          

     
      

            {{-- start Sessão professor --}}
















                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#Matérias" aria-expanded="false" aria-controls="Matérias">

                        <span> <i class="fas fa-briefcase px-2"></i> Conteúdo</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="Matérias">
                 

                        <li class="nav-item"> <a href="{{ route('materia.buscasDiscicplina') }}"
                                class="nav-link py-1">Listar conteúdo</a>
                        </li>
                    </ul>
                </li>
         
          
                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#tarefas" aria-expanded="false" aria-controls="tarefas">

                        <span> <i class="fas fa-briefcase px-2"></i> Tarefas</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="tarefas">
                        <li class="nav-item"> 
                            <a href="{{ url('/tarefas') }}" class="nav-link py-1">Listar tarefas</a>

                            <a href="{{ url('/Tarefas_Submetidas') }}" class="nav-link py-1">Tarefas à submeter</a>
                        </li>
                    </ul>
                </li>
  

          
                <li class="nav-item"> <a href="#" class="nav-link">

                        Jogos

                    </a>
                </li>


                <li class="nav-item "> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#questao" aria-expanded="false" aria-controls="questao">

                        <span> <i class="fas fa-question px-2"></i> Pergunta</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="questao">
                    
                        <li class="nav-item"> <a href="{{ route('quizzes.questoes') }}"
                                class="nav-link py-1">Listar perguntas</a>
                        </li>
                    </ul>
                </li>
      

         


                <li class="nav-item "> <a class="nav-link d-flex align-items-center justify-content-between"
                    data-toggle="collapse" href="#nivel" aria-expanded="false" aria-controls="nivel">

                    <span> <i class="fas fa-level-up-alt px-2"></i> Nível</span>



                    <i class="fas arrow-icon"></i>

                </a>
                <ul class="ml-4 list-unstyled collapse" id="nivel">
                 
                    <li class="nav-item"> <a href="{{ route('quizzes.niveis') }}"
                            class="nav-link py-1">Listar niveis</a>
                    </li>
                </ul>
            </li>

                <li class="nav-item "> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#categoria" aria-expanded="false" aria-controls="categoria">

                        <span> <i class="fas fa-layer-group px-2"></i> Categoria</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="categoria">
                   
                        <li class="nav-item"> <a href="{{ route('quizzes.categorias') }}"
                                class="nav-link py-1">Listar categorias</a>
                        </li>
                    </ul>
                </li>
    
           
                <li class="nav-item"> <a href="#" class="nav-link">

                        Configuração

                    </a>
                </li>
             
                
             


                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#Anoslectivos" aria-expanded="false" aria-controls="Anoslectivos">

                        <span> <i class="fas fa-calendar px-2"></i>Anos lectivos</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="Anoslectivos">
                     

                        <li class="nav-item"> <a href="{{ url('/admin/anolectivo') }}"
                                class="nav-link py-1">Listar
                                anos lectivos </a>
                        </li>
                    </ul>
                </li>

              
                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#escola" aria-expanded="false" aria-controls="escola">

                        <span> <i class="fas fa-school px-2"></i> Escola</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="escola">
                    

                        <li class="nav-item"> <a href="{{ url('escolas') }}" class="nav-link py-1">Listar
                                escolas</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#classe" aria-expanded="false" aria-controls="classe">

                        <span> <i class="fas fa-book-reader px-2"></i>Classe</span>



                        <i class="fas arrow-icon"></i>
                

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="classe">
                      

                        <li class="nav-item"> <a href="{{ url('classes') }}" class="nav-link py-1">Listar
                                classes</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#disciplina" aria-expanded="false" aria-controls="disciplina">

                        <span><i class="fas fa-book-open px-2"></i>Disciplina</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="disciplina">
                      
                        <li class="nav-item"> <a href="{{ url('disciplinas') }}"
                                class="nav-link active py-1">listar
                                disciplinas</a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                    data-toggle="collapse" href="#normativos-professor" aria-expanded="false" aria-controls="normativos-professor">

                    <span><i class="fas fa-ruler px-2"></i></i>Acervo</span>
 


                    <i class="fas arrow-icon"></i>

                </a>
                <ul class="ml-4 list-unstyled collapse" id="normativos-professor">
                
                    <li class="nav-item"> <a href="{{ url('normativos-professor/') }}"
                            class="nav-link active py-1">listar
                            documentos</a>
                    </li>
                </ul>
            </li>



                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#unidades" aria-expanded="false" aria-controls="unidades">

                        <span> <i class="fab fa-unity px-2"></i> Tema</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="unidades">
                      
                        <li class="nav-item"> <a href="{{ url('unidades') }}"
                                class="nav-link active py-1">listar
                                temas</a>
                        </li>
                    </ul>
                </li>
      
  
                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#horiario" aria-expanded="false" aria-controls="horiario">

                        <span> <i class="far fa-calendar-alt px-2"></i> Horários</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="horiario">
                     
                        <li class="nav-item"> <a href="{{ url('/horarios') }}"
                                class="nav-link active py-1">Listar
                                horários</a>
                        </li>

                    </ul>
                </li>
           
            
                {{-- <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#horiariodeEstudo" aria-expanded="false"
                        aria-controls="horiariodeEstudo">

                        <span> <i class="far fa-calendar-alt px-2"></i> Horário de estudo</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="horiariodeEstudo">
                     
                        <li class="nav-item"> <a href="{{ route('admin.HorarioDeEstudo.listar') }}"
                                class="nav-link active py-1">Listar
                                horário de estudo</a>
                        </li>
                    </ul>
                </li> --}}
         


     
                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#dependencia_professor" aria-expanded="false"
                        aria-controls="dependencia_professor">

                        <span><i class="fas fa-recycle px-2"></i> Agentes do MED</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="dependencia_professor">
                        
                        
                        <li class="nav-item"> <a href="{{ route('dependencias.professor') }}"
                                class="nav-link active py-1">
                                Listar agentes</a>
                        </li>
                    </ul>
                </li>
        
            {{-- <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                    data-toggle="collapse" href="#tema" aria-expanded="false" aria-controls="tema">

                    <span> <i class="fas fa-paperclip px-2"></i> Tema</span>



                    <i class="fas arrow-icon"></i>

                </a>
                <ul class="ml-4 list-unstyled collapse" id="tema">
                    <li class="nav-item"> <a href="#" class="nav-link active py-1">Adicionar Utilizador</a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                    data-toggle="collapse" href="#termos" aria-expanded="false" aria-controls="termos">

                    <span> <i class="fas fa-paperclip px-2"></i> Termos</span>



                    <i class="fas arrow-icon"></i>

                </a>
                <ul class="ml-4 list-unstyled collapse" id="termos">
                    <li class="nav-item"> <a href="#" class="nav-link active py-1">Adicionar Utilizador</a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                    data-toggle="collapse" href="#horarios" aria-expanded="false" aria-controls="horarios">

                    <span> <i class="far fa-calendar-alt px-2"></i> Horários</span>





                    <i class="fas arrow-icon"></i>

                </a>
                <ul class="ml-4 list-unstyled collapse" id="horarios">
                    <li class="nav-item"> <a href="#" class="nav-link active py-1">Adicionar Utilizador</a>
                    </li>
                </ul>
            </li> --}}
{{--          
                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#limiteDeSessao" aria-expanded="false"
                        aria-controls="limiteDeSessao">

                        <span> <i class="fas fa-unlock px-2"></i> Limite de sessão</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="limiteDeSessao">
                    
                        <li class="nav-item"> <a href="{{ route('tempo_sessao') }}"
                                class="nav-link active py-1">Listar tempos</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#relatorio" aria-expanded="false" aria-controls="relatorio">

                        <span> <i class="fas fa-chart-pie px-2"></i> Relatório</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="relatorio">
                        <li class="nav-item"> <a href="{{ route('relatorio.aluno.classe.pesquisar') }}"
                                class="nav-link active py-1">Alunos por classe</a>
                        </li>
                        {{-- <li class="nav-item"> <a href="{{ route('ver_quantidade_tarefas_submetidas') }}"
                                class="nav-link active py-1">Tarefas submetidas</a>
                        </li> --}}

                        <li class="nav-item"> <a href="{{ route('aluno.provincia.pesquisar') }}"
                                class="nav-link active py-1">Alunos por províncias</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('relatorio.aluno.municipio.pesquisar') }}"
                                class="nav-link active py-1">Alunos por municípios</a>
                        </li>
                        <li class="nav-item"> <a href="{{ route('relatorio.aluno.escola.pesquisar') }}"
                                class="nav-link active py-1">Alunos por escolas</a>
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

                <li class="nav-item"> <a href="#" class="nav-link">
                        Registro de atividades

                    </a>
                </li>


                <li class="nav-item"> <a class="nav-link d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#registros" aria-expanded="false" aria-controls="registros">

                        <span><i class="fas fa-database px-2"></i> Registro</span>



                        <i class="fas arrow-icon"></i>

                    </a>
                    <ul class="ml-4 list-unstyled collapse" id="registros">


                        <li class="nav-item"> <a href="{{ url('admin/logs/pesquisar') }}"
                                class="nav-link py-1">Listar registros </a>
                        </li>
                    </ul>
                </li>
      
        </ul>
    </div>
</aside>
