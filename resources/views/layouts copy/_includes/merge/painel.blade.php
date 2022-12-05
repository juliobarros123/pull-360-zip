@include('layouts._includes.painel.Header')
@include('layouts._includes.painel.Menu')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                @yield('conteudo')

            </div>
        </div>

    </div>
    <div class="col-sm-12 text-center pt-3 bg-dark fixed-bottom" >
        <a href="https://www.itel.gov.ao" target="_blank" >
            <p class="text-white">Desenvolvido pelo Instituto de Telecomunicações - ITEL</p></a>

    </div>
</main>

@include('layouts._includes.painel.Footer')
