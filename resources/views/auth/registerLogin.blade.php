@extends('layouts._includes.merge.site')
@section('titulo', 'Avea - Login')
@section('conteudo')
<script src="/js/sweetalert2.all.min.js"></script>
    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Falha ao cadastrar',
        })
    </script>
@endif


    @if (session('encarregado'))
    <script>
        Swal.fire(
            'Encarregado cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
    <div class="main-container  " >
        <header class="signup dimensao-padrao align-content-center-vertical">
            <div class="background-image-holder ">
                <img class="background-image h-100" alt="Background Image " src="/site/img/hero17.jpg">
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
                        <h1 class="text-white">Aceder a minha conta
                            <p class="text-white lead">Introduza os seus dados de acesso à sua conta!</p>
                        </h1>
                    </div>
                </div>
                <!--end of row-->

                <div class="row text-center">

                    <div class="col-sm-12 text-center">
                        <div class="photo-form-wrapper clearfix">
                            <form method="post" action="{{ route('login') }}" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-md-offset-3 col-sm-offset-2">
                                        <input class="signup-email-field validate-required validate-email" id="email"
                                            type="email" placeholder="Endereço de email" name="vc_email" required autocomplete="off">
                                    </div>

                                    <div class="col-md-3 col-sm-4">
                                        <div class="div_input_password">
                                        <input class="form-password" id="password" type="password"
                                            placeholder="Palavra passe" name="password" required autocomplete="off">
                                            <span class="lnr lnr-eye"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-md-offset-0 col-sm-4 col-sm-offset-4 text-center">
                                        {{-- <input  class="btn btn-primary " value=""> --}}
                                        <input type="submit" class="btn btn-primary btn-filled" value="Entrar">
                                    </div>
                                </div>
                                <!--end of row-->
                            </form>
                        </div>
                        <!--end of photo form wrapper-->
                        <div class="row">
                        <span class="text-white col-md-12">Ainda possui uma conta? <a href="{{ url('encarregado/registrar') }}">Cadastro de Encarregado de Educação ➞</a></span>
                        <span class="text-white col-md-12">Esqueceu sua senha? <a href="{{ url('palavra_passe/recuperar') }}">Recuperar ➞</a></span>
                    </div>
                    </div>

                </div>


            </div>
            <!--end of container-->
        </header>

        
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>

 @if (session('status'))
     <script>
         Swal.fire(
             'Conta não encontrada!',
             '',
             'success'
         )

     </script>
 @endif
@endsection
