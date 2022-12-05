<!DOCTYPE html>
<html lang="en">


@include('layouts._includes.site.head')

{{-- <body class="vh-100" oncontextmenu="return false"> --}}

<body class="vh-100">
    <header>
        <div class="bg-menu-2">
            <div class="service ">
                <div class="box-72 ">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="/assets/images/PUL_306º_LOGO/PUL_306º_LOGO_COR/PUL360º_COR.png" class="logo "
                                alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <ul class="navbar-nav  ">
                                <li class="nav-item ">
                                    <a class="nav-link" href="#">SERVIÇOS </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-globe"></i></a>
                        <li class="nav-item">
                                    <a class="nav-link " href="#"> <i class="fas fa-search" data-toggle="modal"
                                            data-target=".bd-example-modal-lg-pesquisa"></i></a>
                                    <a class="nav-link disabled" href="#"> <i class="far fa-user"></i> </a>
                                    {{-- <a class="nav-link disabled" href="#"> <i class="fas fa-store-alt"></i></a> --}}
                                    <a class="nav-link " href="{{route('carrinhos.estado')  }}"> <i class="fas fa-cart-plus"> </i><small class="text-warning ttl-product-cart">{{session()->has("produtos")?count(session()->get('produtos')):0}}</small></a>
                                </li>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="modal fade bd-example-modal-lg-pesquisa" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-11">
                        <input type="search" id="input-pesquisa" class="border-form w-100 btn-1"
                            placeholder="Pesquisar arte">
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('timeline.fotos-galeria.cadastrar') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body mx-3" id="pesq-resultados">


                        </div>
                        {{-- <div class="modal-footer d-flex justify-content-center">
					<button type="submit" class="button">Postar comentário</button>
				</div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg-pesquisa" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <div class="col-md-12">
                        <input type="search" id="input-pesquisa" class="campo" placeholder="Pesquisar arte">
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('timeline.fotos-galeria.cadastrar') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body mx-3" id="pesq-resultados">


                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @yield('conteudo')
    @include('layouts._includes.site.footer')
</body>

</html>
