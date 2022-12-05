






@extends('layouts._includes.site.app')
@section('titulo', 'Confirmar código')
@section('conteudo')
<div class="autenticacao min-vh-100 mthd ">
    <div class="pt-3 px-5">
        <div class="row pt-5 justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4 mb-4">
                <div class="bg-white shadow p-4 h-100">
                    <form method="POST" class="style-1"  action="{{ route('palavra_passe.registar_palavra_passe') }}">
                            @csrf
                        
                        <div class="mb-5">
                           

                             <p class="text-uppercase text-secondary text-center font-weight-bold"><b>Redifinir palavra passe</b></p>
                             <p class="text-secondary text-center    "> Insira a palavra passe nova e confirma no campo de confirmação de
                                palavra passe</p>
                        </div>
                        <div class="form-group">
                            <label class="bold" for="email">Palavra passe*</label>
                            <input  type="password" name="password" class="form-control bg-white campo "
                            required
                            placeholder="Confirma aqui a nova palavra passe" minlength="8">
                       
                        </div>

                        <div class="form-group">
                            <label class="bold" for="email">Confirmar
                                palavra passe*</label>
                            <input  type="password" class="form-control bg-white campo "
                            name="confirmed" required
                            placeholder="Confirma aqui a nova palavra passe" minlength="8">
                       
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



    @if (session('senha_nao_confirmada'))
        <script>
            Swal.fire(
                'A senha não bate com a confimação!',
                '',
                'error'
            )
        </script>
    @endif


@endsection

