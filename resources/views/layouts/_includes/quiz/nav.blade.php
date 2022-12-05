<nav class="navbar navbar-expand-sm   border-bottom shadow  bg-white " id="nav">
    <a class="navbar-brand  text-white" href="#">
        Quiz
    </a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="line"></span> 
        <span class="line"></span> 
        <span class="line" style="margin-bottom: 0;"></span>
</button>

    {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ">
            <li class="nav-item border_menu d-flex justify-content-center ">
                <a class="navbar-brand mx-auto  flex-fill text-center" href="{{ route('xilonga') }}">
                    <img style="

                    height: 76px;" class="" alt="Logo" src="/images/insignia/logo.svg">
                   
            </li>
            <li class="nav-item active  border_menu">
                @yield('voltar')
            </li>



            <li class="nav-item border_menu ">
                <a class="nav-link m-1 text-secondary text-center" href="{{url('home') }}">Painel</a>
            </li>
            <li class="nav-item border_menu ">
                <a class="nav-link m-1 text-secondary text-center"  href="#">Sobre</a>
            </li>

            
        </ul>
        <ul class="navbar-nav ml-auto">

           

            <li class="nav-item rounded  ">
                <a class="nav-link disabled " href="">
                    <p class="text-secondary text-center">{{isset(session('jogador')['0']['nome'])?session('jogador')['0']['nome']:'AVATAR'}}</p>
                </a>
            </li>
        </ul>
    </div> --}}




    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link " href="{{ route('xilonga') }}"><img style="

                height: 60px;" class="" alt="Logo" src="/images/insignia/logo.svg"></a>
          </li>
          <li class="nav-item">
            @yield('voltar')
          </li>
          <li class="nav-item">
            <a class="nav-link pt-4 text-center text-dark" href="{{url('home') }}">Painel</a>
          </li>
         
         
        </ul>
        <form class=" my-1 my-lg-0">
            <a class="nav-link disabled " href="">
                {{-- <p class="text-secondary text-center">{{isset(session('jogador')['0']['nome'])?session('jogador')['0']['nome']:'AVATAR'}}</p> --}}
            </a>
        </form>
      </div>
    </nav>
</nav>

