@extends('layouts._includes.site.app')
@section('titulo', 'Sobre o xilonga')
@section('conteudo')
<div class="autenticacao min-vh-100 mthd ">
    <div class="pt-3 px-5">
        <div class="row pt-5 justify-content-center">
            {{-- <div class="col-md-6 col-lg-5 col-xl-4 mb-4">
                <div class="bg-white shadow p-4 h-100">
                    <form class="style-1">
                        <div class="mb-5">
                             <h5 class="text-uppercase text-secondary text-center font-weight-bold">Contecte-se</h5>
                        </div>
                        <div class="form-group">
                            <label class="bold" for="email">Nome de usuário ou e-mail*</label>
                            <input type="email" class="form-control bg-white rounded-pill "
                            id="email" aria-describedby="emailHelp" placeholder="Usuário">
                            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone

                        else.</small-->
                        </div>
                        <div class="form-group toggle-password">
                            <label for="password" class="bold">Senha*</label>
                            <input type="password" class="form-control  rounded-pill input--"
                            id="password" placeholder="Senha"> <i class="fas fa-eye text-muted toggler"></i>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Lembre de mim</label>
                        </div>
                        <div class="py-3">
                            <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                                <div class="text-uppercase text-increase">Conecte-se</div>
                            </button>
                        </div> <a class="font-weight-bold text-decoration-none" href="#">Perdeu a sua senha?</a>
                    </form>
                </div>
            </div> --}}
            <div class="col-md-6 col-lg-5 col-xl-4 mb-4">
                <div class="bg-white shadow p-4 h-100">



                    
                    <form class="style-1">
                         <h5 class="text-uppercase text-secondary text-center font-weight-bold">Registro</h5>
                         <h6 class="text-center mb-3">Bem-vindo(a) Encarregado(a) de Educação!</h6>
                        <div class="form-group">
                            <label class="bold" for="email2">Endereço de e-mail*</label>
                            <input type="email" class="form-control bg-white rounded-pill "
                            id="email2" placeholder="Usuário">
                        </div>
                        <div class="form-group">
                            <label class="bold" for="username">Nome de usuário*</label>
                            <input type="text" class="form-control bg-white rounded-pill "
                            id="username" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label class="bold" for="lastname">Nome secundário*</label>
                            <input type="text" class="form-control bg-white rounded-pill "
                            id="lastname" placeholder="Apelido">
                        </div>
                        <div class="form-group toggle-password">
                            <label for="password2" class="bold">Senha*</label>
                            <input type="password" class="form-control  rounded-pill input--"
                            id="password2" placeholder="Senha"> <i class="fas fa-eye text-muted toggler"></i>
                        </div>
                        <div class="form-group toggle-password">
                            <label for="password3" class="bold">Confirme a senha*</label>
                            <input type="password" class="form-control  rounded-pill input--"
                            id="password3" placeholder="Senha"> <i class="fas fa-eye text-muted toggler"></i>
                        </div>
                        <div class="form-check text-center">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label d-inline" for="remember">Eu li e aceito com os <a href="#" class="font-weight-bold text-secondary">Termos e Condições</a>
                            </label>
                        </div>
                        <div class="pt-3">
                            <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto " id="botao-proximo"
                            disabled>
                                <div class="text-uppercase text-increase" >Registro</div>
                            </button>
                        </div>
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

@endsection
