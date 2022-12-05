

@extends('layouts._includes.site.app')
@section('titulo', 'Confirmar código')
@section('conteudo')
<div class="autenticacao min-vh-100 mthd ">
    <div class="pt-3 px-5">
        <div class="row pt-5 justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4 mb-4">
                <div class="bg-white shadow p-4 h-100">
                    <form method="POST" class="style-1"  action="{{ route('palavra_passe.vrf_codigo_confirme') }}">
                            @csrf
                        
                        <div class="mb-5">
                           

                             <p class="text-uppercase text-secondary text-center font-weight-bold"><b>Confirmar código</b></p>
                             {{-- <p class="text-secondary text-center    "> Insere o teu Email   e o cógido que te foi enviado por email.</p> --}}
                        </div>
                        <div class="form-group">
                            <label class="bold" for="email">E-mail*</label>
                            <input type="text" class="form-control bg-white campo "
                            id="email" aria-describedby="emailHelp" placeholder="E-mail" name="email">
                            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone

                        else.</small-->
                        </div>

                        <div class="form-group">
                            <label class="bold" for="email"> Código de verificação*</label>
                            <input type="number" class="form-control bg-white campo "
                            id="email" aria-describedby="emailHelp" placeholder="Código" name="codigo">
                            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone

                        else.</small-->
                        </div>

                       
                      
                    
                        <div class="py-3">
                            <button type="submit" class="btn btn-sm px-3 btn-secondary button  d-block mx-auto ">
                                <div class="text-uppercase text-increase">Confirmar</div>
                            </button>
                        </div> 
                        {{-- <a class="font-weight-bold text-decoration-none" href="#">Perdeu a sua senha?</a> --}}

                      
                    </form>
                
                </div>
            </div>
       
        </div>
    </div>
</div>
<div class="logo-section-container container-custom p-5">
    <div class="mx-auto col-md-8 py-4">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-4 mb-3"> <a href="https://governo.gov.ao/" class="text-decoration-none d-block mx-auto">

            <img src="site/assets/img/gov.ao.png" height="80" width="100"class="d-block mx-auto" >

        </a>
            </div>
            <div class="col-md-4 mb-3"> <a href="https://med.gov.ao/" class="text-decoration-none d-block mx-auto">

            <img src="site/assets/img/med.gov.png" class="d-block w-100">

        </a>
            </div>
            <div class="col-md-4 mb-3"> <a href="https://minttics.gov.ao/" class="text-decoration-none d-block mx-auto">

            <img src="site/assets/img/minttics.gov.png" class="d-block w-100">

        </a>
            </div>
        </div>
    </div>
</div>


<script src="/js/sweetalert2.all.min.js"></script>

    @if (session('email_nao_encontrado'))
        <script>
            Swal.fire(
                'Não econtramos conta associada á este Email!',
                '',
                'error'
            )
        </script>
    @endif

    @if (session('codigo_invalido'))
    <script>
        Swal.fire(
            'Código inválido!',
            '',
            'error'
        )
    </script>
@endif
    
@if (session('enviado'))
    <script>
        Swal.fire(
            'Codigo enviado!',
            'Se não aparecer na caixa de entrada, verifica se chegou no spam',
            'info'
        )
    </script>
@endif

@endsection

