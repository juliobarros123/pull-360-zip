@extends('layouts._includes.merge.site')
@section('titulo', 'Avea - Cadastrar Encarregado')
@section('conteudo')

    <style>
      .p-titulo{
    color: #005BC4;

    font-size: 30px;
}


.btn {
    border-radius: 25px;
    -webkit-border-radius: 25px;
    -moz-border-radius: 25px;
    -ms-border-radius: 25px;
    -o-border-radius: 25px;

    padding-left: 15px;
    padding-right: 15px;
    background: #3055A5;
 font-size: 14px;
    border: black;
}

.btn:hover{
    background: #ee6636;
}

.card{
  height: 100%;
}
.b{
   color: #3055A5;
}
.texto-cor-azul{
    color: #3055A5;
}
.text{
    color: rgba(110, 109, 109, 0.877);
}
.texto-titulo{

    font-size: 200% !impor;

}
.btn-custom{
    background: #3055A5;
    border-radius: 25px !important;
    color: white;

}
.btn-largura{

    width: 30%;

}
.form-control {
    height: 30px!important;
}
.form-group{
    margin:5%;
}
.form-check {
    position: relative;
    display: block;
    padding-left: 1.25rem
}
.form-check-input:disabled~.form-check-label, .form-check-input[disabled]~.form-check-label {
    color: #6c757d
}

.form-check-label {
    margin-bottom: 0
}
.lembre{
    margin-left: 14px;
                                margin-top: 3px;
}

    </style>
    @include('site.encarregado.bot')
    <div class="main-container " style=" overflow: visible; height: 90vh">
        <div class="signup ">

            <div class="corpo container mt-5 mb-5" >
                <div class="row mt-5" style="margin-top:10%!important">
                     <div class="col-sm-6">

                      <div class="card shadow p-3 mb-5 bg-white rounded" style="width:100%;">
                          <div class="card-body">
                            <p class="card-title d-flex justify-content-center mb-3 texto-cor-azul p-titulo"><b>CONECTE-SE</b></p>
                            <form method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                <label for="exampleInputEmail1">Nome de usuário ou email*</label>

                                <input  required  type="text" name="vc_email" class="form-control border border-dark" id="exampleInputEmail1" placeholder="Usuário" style="border-radius: 46px!important;">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Senha*</label>
                                <input  required type="password" name="password" class="form-control border border-dark " id="exampleInputPassword1" placeholder="Senha" style="border-radius: 46px!important;">
                              </div>


                              <div class="form-group form-check">
                                <input   type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label lembre" for="exampleCheck1">Lembre de mim</label>
                              </div>



                              <div class="d-flex justify-content-center">
                                <button type="submit" class=" mb-2  bt_menu btn-custom btn-largura ">CONECTE-SE</button>
                              </div>



                            </form>

                            <div class=" form-group">

                                <a class="text" href="{{ url('palavra_passe/recuperar') }}">
                                <p class="text"><b>Perdeu a sua senha?</b></p>

                              </a>
                              </div>

                          </div>
                        </div>

                     </div>
                     <div class="col-sm-6">
                      <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 100%">
                      <div class="card-body">
                        <p class="card-title d-flex justify-content-center texto-cor-azul p-titulo "><b>Bem vindo(a) Encarregado(a) de Educação</b></p>
                        <h4 class="card-subtitle mb-2 mt-3   d-flex justify-content-center mb-3"> Os teus dados são protegidos pela lei de protecção dos dados pessoais (Lei nº22/11, de 17 de Junho).</h4>
                        <form action="{{ url('users/salvar') }}" method="post"
                         enctype="multipart/form-data">
                         @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1" > Endereço de email*</label>
                            <input  required type="email" name="vc_email" class="form-control border border-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" style="border-radius: 46px!important;">
                          </div>



                          <div class="form-group">
                            <label for="exampleInputPassword1">Nome de usuário*</label>
                            <input  required type="text"  name="vc_nomeUtilizador" class="form-control border border-dark" id="exampleInputPassword1" placeholder="Nome" style="border-radius: 46px!important;">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Sobrenome de secundário*</label>
                              <input  required type="text"  name="vc_primemiroNome" class="form-control border border-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apelido" style="border-radius: 46px!important;">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1" id="span-senha">Senha*</label>
                              <div class="div_input_password">
                              <input  required type="password" class="form-control border border-dark" placeholder="Senha" style="border-radius: 46px!important;"  id="password" name="password" required>
                              <span class="lnr lnr-eye"></span>
                            </div>
                            </div>



                            <div class="form-group">
                              <label for="exampleInputPassword1">Comfirmar a senha*</label>

                              <div class="div_input_password ">
                                <input type="checkbox"  id="termo_assinado" name="termo" hidden>
                                <input  required name="password_confirmation" id="password_confirm" type="password" class="form-control border border-dark" id="exampleInputPassword1" placeholder="Senha" style="border-radius: 46px!important;">
                                <span class="lnr lnr-eye view-pass-confirm"></span>
                              </div>
                            </div>
                          <div class="d-flex justify-content-center">
                              <div class="form-group form-check ml-5 ">
                            <input   type="checkbox" class="form-check-input" id="termo">
                            <label class="form-check-label lembre " for="exampleCheck1 ">Eu li e aceito os <a href="{{ route('site.termos') }}" style="texto-cor-azul">termos e condições</a></label>
                        </div>
                        </div>
                          <div class="d-flex justify-content-center">
                          <button type="submit" class=" bt_menu btn-custom btn-largura " id="botao-proximo" disabled>REGISTRO</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
             </div>
              </div>
            </div>

        {{-- <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
                        <i class="icon icon-jumbo icon_info"></i>
                        <div id="tweets" data-widget-id="492085717044981760">

                        </div>
                        <p>
                            Após fazer o cadastro e o login, <strong>vá em actualizar os seus dados para completar o
                                cadastro</strong> com os dados pessoais
                        </p>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section> --}}

    </div>


    <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
    @if (session('error'))
        <script>
            Swal.fire(
                'Falha ao cadastrar usuário!',
                'Email existente ou senhas diferentes ',
                'error'
            )
        </script>
    @endif
@endsection
