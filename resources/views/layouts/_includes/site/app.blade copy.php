<!DOCTYPE html>
<html lang="pt">
    @include('layouts._includes.site.head')
<body>
	<header>
        <div class="bg-menu-2">
            <div class="service ">
                <div class="box-72 ">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a class="navbar-brand" href="#">
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
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#"> <i class="fas fa-search"></i></a>
                                    <a class="nav-link disabled" href="#"> <i class="far fa-user"></i> </a>
                                    <a class="nav-link disabled" href="#"> <i class="fas fa-store-alt"></i></a>
                                </li>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
  
	<!-- Offcanvas Menu Section end -->

	<!-- Hero Section end -->
    @yield('conteudo')
	<!-- Hero Section end -->

	<!--====== Javascripts & Jquery ======-->
    @include('layouts._includes.site.footer')

	</body>
</html>
