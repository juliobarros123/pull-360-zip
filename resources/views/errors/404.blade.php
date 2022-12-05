


@extends('layouts._includes.site.app')
@section('titulo', 'ERRO 404')
@section('conteudo')
    <div class="autenticacao min-vh-100 mthd ">
        <div class="pt-3 px-5">
            <div class="row pt-5 justify-content-center">
            




                <div class="col-md-12 col-lg-12 col-xl-12 mb-4">
                    <div class="bg-white shadow p-4 h-100">
                    


                        <div class="container align-vertical">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <i class="icon icon-compass"></i>
                                    <h1 class="jumbo">404</h1>
                                    <h1><strong>Parece que o desencaminhamos!</strong><br>Vamos voltar aos trilhos ...</h1>
                                    <a href="{{ url('/')}}" class="btn btn-primary btn-white" target="default">Me leve para casa</a>
                                  {{--   <a href="#" class="btn btn-primary btn-white btn-text-only">Report This</a> --}}
                                </div>
                            </div>
                            <!--end of row-->
                        </div>

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-section-container container-custom p-5">
        <div class="mx-auto col-md-8 py-4">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-4 mb-3"> <a href="https://governo.gov.ao/" class="text-decoration-none d-block mx-auto">

                        <img src="site/assets/img/gov.ao.png" height="80" width="100" class="d-block mx-auto">

                    </a>
                </div>
                <div class="col-md-4 mb-3"> <a href="https://med.gov.ao/" class="text-decoration-none d-block mx-auto">

                        <img src="site/assets/img/med.gov.png" class="d-block w-100">

                    </a>
                </div>
                <div class="col-md-4 mb-3"> <a href="https://minttics.gov.ao/"
                        class="text-decoration-none d-block mx-auto">

                        <img src="site/assets/img/minttics.gov.png" class="d-block w-100">

                    </a>
                </div>
            </div>
        </div>
    </div>
    
 
@endsection
