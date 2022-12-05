
<style>

.container-notificao{
    width: 230px!important;
}

</style>

<nav class="navbar navbar-expand-sm bg-white navbar-light py-3"> <a class="navbar-brand" href="/"><i
            class="fas fa-arrow-circle-left text-muted-2"></i></a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item my-auto px-2 px-md-4 ">
            <div class="btn-group ">
                <div class="d-flex align-items-center"> <a href="#"
                        class="d-block text-decoration-none text-muted notification-container" data-toggle="dropdown"
                        aria-expanded="false">

                        <i class="fas fa-bell"></i>

                        <div class="number-container d-flex align-items-center justify-content-center">{{ notificacoes_materia()->count()+notificacoes_terefa()->count() }}</div>


                        <div class="dropdown    bg-transparent" >
                       
                            
                           
                            
                       
                            <div class="dropdown-menu  rounded border-0 bg-transparent container-notificao overflow-auto" style="width:500px">
                           

                              @foreach (notificacoes_terefa() as $item)
                              <div class="bg-white shadow mt-1" >
                                  <div class="toast-header">
                                     
                                  
                                  </div>
                                  <div class="toast-body ">
                                      {{-- <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button> --}}
                                    <strong class="mr-auto">{{  $item->notificacao }}</strong>
                              
                     
                                    <small class="col-md-12">{{ quantos_dias($item->created_at) }}</small>
                                      <div class="justify-content-end d-flex ">
                                          <a style="font-size: 15px;" href="{{ route('alunos.minhaTarefa', ['id_classe_disciplina' => $item->id_classe_disciplinas]) }}"
                                          class="btn-sm btn-secondary-reverse rounded-pill text-decoration-none px-2 c " >
                                          Acessar</a>
                                      </div>
                                 
                                    
                                  </div> 
                                </div>
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
            <div class="btn-group avatar-container">
                <div class="d-flex align-items-center">
                    @php
                        $img = Auth::User()->profile_photo_path;
                    @endphp
                    @if (isset($img))
                        <img src="{{ url("storage/{$img}") }}" alt="Imagem de Perfil" class="avatar">
                    @endif
                    <a href="#"
                        class="d-block ml-1 ml-md-3 font-weight-bold dropdown-toggle text-decoration-none text-dark"
                        data-toggle="dropdown" aria-expanded="false">


                        {{ Auth::User()->vc_primemiroNome . ' ' . Auth::User()->vc_apelido }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right"> <a
                            href="{{ route('admin.users.perfil', Auth::User()->id) }}"
                            class="dropdown-item small text-muted" type="button">Perfil</a>
                        <a href="{{ route('admin.users.editar', Auth::user()->id) }}"
                            class="dropdown-item small text-muted" type="button">Editar</a>
                        <a class="dropdown-item small text-muted" href="{{ route('logout') }}" id="sessao"
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
