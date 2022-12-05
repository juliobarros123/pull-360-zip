@extends('layouts._includes.site.app')
@section('titulo', 'Registar-se')
@section('conteudo')
    <div class="autenticacao min-vh-100 mthd ">
        <div class="pt-3 px-5">
            <div class="row pt-5 justify-content-center">





                <div class="col-md-12 col-lg-12 col-xl-12 mb-4">
                    <div class="bg-white shadow p-4 h-100">


                        <p class=" text-uppercase text-secondary text-center font-weight-bold  "><b>Bem-vindo(a)
                                Professor(a) de Educação</b>
                        </p>
                        <h4 class="text-secondary text-center">
                            Os seus dados são protegidos pela lei da protecção dos dados pessoais (Lei N.* 22/11, de 17 de
                            Junho).</h4>


                        <form action="{{ route('professor.cadastrarProfessor') }}" method="post"
                            enctype="multipart/form-data" class="">
                            @csrf

                            <div class="avatar-container mb-5 d-flex align-items-center">
                                <img src="/site/assets/img/noPerson.png" alt="Imagem de Perfil" class=" mr-4" style="
                                        height: 120px;
                                        width: 120px;
                                        border-radius: 50%;
                                    ">
                                <div>
                                    <label onclick="upload()"
                                        class="btn btn-sm px-3 rounded-pill text-secondary border border-secondary"
                                        for="avatar">Carregar fotografia</label>
                                    <input type="file" class="d-none" id="avatar" name="foto" size="50MB image/*">
                                </div>
                            </div>


                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputPassword1" id='span-user'>Nome de
                                        usuário*</label>
                                    <input required type="text" name="vc_nomeUtilizador" id='vc_nomeUtilizador'
                                        class="form-control bg-white rounded-pill " id="exampleInputPassword1"
                                        placeholder="Nome" style="border-radius: 46px!important;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputEmail1">Primeiro nome *</label>
                                    <input required type="text" name="vc_primemiroNome"
                                        class="form-control bg-white rounded-pill " aria-describedby="emailHelp"
                                        placeholder="Primeiro nome" style="border-radius: 46px!important;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputEmail1">Sobrenome *</label>
                                    <input required type="text" name="vc_apelido"
                                        class="form-control bg-white rounded-pill " aria-describedby="emailHelp"
                                        placeholder="Apelido" style="border-radius: 46px!important;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputPassword1">Número de telefone*</label>
                                    <input type="number" name="vc_telefone" class="form-control bg-white rounded-pill "
                                        id="exampleInputPassword1" placeholder="9xx xxx xxx"
                                        style="border-radius: 46px!important;">
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputEmail1"> E-mail*</label>
                                    <input required type="email" name="vc_email" class="form-control bg-white rounded-pill "
                                        aria-describedby="emailHelp" placeholder="nome@email.com"
                                        style="border-radius: 46px!important;">
                                </div>







                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputEmail1">BI/NIF*</label>
                                    <input required type="text" name="vc_BI" minlength="14"
                                        class="form-control bg-white rounded-pill " aria-describedby="emailHelp"
                                        placeholder="BI/NIF" style="border-radius: 46px!important;" maxlength="14">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputEmail1">Número de agente
                                        *</label>
                                    <input required type="number" name="it_num_agente"
                                        class="form-control bg-white rounded-pill " aria-describedby="emailHelp"
                                        placeholder="Número de agente" style="border-radius: 46px!important;" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputEmail1">Género*</label>

                                    <select name="vc_genero" required class="form-control bg-white rounded-pill "
                                        aria-describedby="emailHelp" placeholder="Número do Bilhete de Identidade"
                                        style="border-radius: 46px!important;">
                                        <option disabled value="" selected>Seleccione o género</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="feminino">Feminino</option>
                                    </select>

                                </div>


                                <div class="form-group col-md-4">
                                    <label class="bold" id="label_data_nascimento">Data de nascimento*</label>
                                    <input required type="date" max="{{ date('Y') - 18 }}-01-01" name="dt_data_nascimento"
                                        id="id_data_nascimento" class="form-control bg-white rounded-pill "
                                        aria-describedby="emailHelp" placeholder="Data de Nascimento"
                                        style="border-radius: 46px!important;">
                                </div>
                                <div class=" form-group col-md-4">
                                    <div class="form-group">
                                        <label class="bold" for="gradesubject">{{ __('Escola*') }}</label>
                                        <select class="form-control bg-white rounded-pill" name="it_id_escola"
                                            id="it_id_escola">
                                            @isset($professorEscola)
                                                <option value="{{ $professorEscola['0']->it_id_escola }}" selected>
                                                    {{ $professorEscola['0']->vc_escola }}</option>
                                            @endisset
                                            @foreach ($escolas as $escola)
                                                <option value="{{ $escola->id }}">{{ $escola->vc_escola }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group  col-md-4">
                                    <div class="form-group">
                                        <label class="bold"
                                            for="theme">{{ __('Seleccione a docência *') }}</label>
                                        <select class="form-control bg-white rounded-pill" name="docencia"
                                            id="id_tipo_professor" required>
                                            <option selected disabled>Docência</option>
                                            <option value="monodocencia">Monodocência</option>
                                            <option value="pluridocencia">Pluridocência</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group  col-md-4">
                                    <div class="form-group">
                                        <label class="bold" for="theme">{{ __('Classes*') }}</label>
                                        <select class="form-control bg-white rounded-pill" name="id_classe" id="id_classe"
                                            required>
                                            <option selected disabled>Classe</option>
                                            {{-- <option value="monodocencia">Monodocência</option>
                                          <option value="pluridocência">Pluridocência</option> --}}

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputPassword1" id="span-senha">Senha*</label>
                                    <div class="div_input_password">
                                        <input required type="password" class="form-control bg-white rounded-pill "
                                            placeholder="Senha" style="border-radius: 46px!important;" id="password"
                                            name="password" required>
                                        <span class="lnr lnr-eye"></span>
                                    </div>
                                </div>



                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputPassword1">Confirmar a senha*</label>

                                    <div class="div_input_password ">

                                        <input required name="password_confirmation" id="password_confirm" type="password"
                                            class="form-control bg-white rounded-pill " id="exampleInputPassword1"
                                            placeholder="Senha" style="border-radius: 46px!important;">
                                        <span class="lnr lnr-eye view-pass-confirm"></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputPassword1"></label>

                                    <div class="div_input_password ">

                                        <p class="mt-2">*Para campos de carácter  obrigatório
                                        </p>
                                        
                                        {{-- <p class="mt-2">*Não introduzir e-mails fictícios
                                        </p> --}}
                                    </div>
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label class="bold" for="exampleInputPassword1"></label>

                                    <div class="div_input_password ">

                                        <p class="mt-2">*Não introduzir e-mails fictícios
                                        </p>
                                    </div>
                                </div> --}}
                                <div class="d-flex justify-content-center w-100 ">
                                    <div class="form-group form-check ml-5 ">
                                        <input type="checkbox" class="form-check-input" id="termo" name="termo">
                                        <label class="form-check-label lembre " for="exampleCheck1 ">Eu li e aceito os
                                            <a href="{{ route('site.termos') }}" style="texto-cor-azul">termos e
                                                condições</a></label>
                                    </div>
                                </div>
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Disciplinas</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modal-body-disciplinas">

                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Concluído</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class=" d-flex justify-content-center  col-md-12" id="tool">
                                    <button type="submit"
                                        class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto "
                                        id="botao-proximo" disabled>
                                        <div class="text-uppercase text-increase">Próximo</div>
                                    </button>
                                </div>

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

                        <img src="/site/assets/img/gov.ao.png" height="80" width="100" class="d-block mx-auto">

                    </a>
                </div>
                <div class="col-md-4 mb-3"> <a href="https://med.gov.ao/" class="text-decoration-none d-block mx-auto">

                        <img src="/site/assets/img/med.gov.png" class="d-block w-100">

                    </a>
                </div>
                <div class="col-md-4 mb-3"> <a href="https://minttics.gov.ao/"
                        class="text-decoration-none d-block mx-auto">

                        <img src="/site/assets/img/minttics.gov.png" class="d-block w-100">

                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script>
        //       $("#labelFoto").click(function(){
        //         // $("#input_file").click();
        // alert("oa");
        //       });
        function upload() {
            $("#input_file").click();
        }
    </script>


    <script>
        $("#termo").click(function() {

            console.log($("#termo").is(':checked') === true);
            if ($("#termo").is(':checked') === true) {

                $("#botao-proximo").attr("disabled", false);
                $("#termo_assinado").click();



            } else {
                $("#termo_assinado").click();
                $("#botao-proximo").attr("disabled", true);


            }
        });
    </script>

    @if (session('error'))
        <script>
            Swal.fire(
                'Falha ao cadastrar usuário!',
                'Email existente ou senhas diferentes ou mesmo nome de usuário existente ',
                'error'
            )
        </script>
    @endif
    @if (session('dependencias'))
        <script>
            Swal.fire(
                'Falha ao cadastrar usuário!',
                'Número de agente ou Bilhete de identidade inválidos ',
                'error'
            )
        </script>
    @endif
    <script>
        $("#id_tipo_professor").change(function() {


            var docencia = $(this).val();

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'ajax-classes/' + docencia,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: true,
                data: '',
                success: function(response) {
                    //Start admin


                    $("#id_classe").append('<option  selected disabled>Classe</option>');
                    $("#id_classe").empty();


                    $("#id_classe").append('<option  selected disabled>Classe</option>');
                    $.each(response, function(id, name) {
                        $("#id_classe").append('<option  value="' + id + '">' + name +
                            '.ª Classe</option>');
                    });
                    // End admin

                }
            });
        });



        $("#id_classe").change(function() {

            var docencia = $("#id_tipo_professor").val();
            //   alert(docencia);
            if (docencia == 'pluridocencia') {
                var id_classe = $(this).val();

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'ajax-disciplinas/' + id_classe,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    async: true,
                    data: '',
                    success: function(response) {

                        $("#modal-body-disciplinas").empty();
                        $.each(response, function(id, name) {
                            $("#modal-body-disciplinas").append(
                                '<div class="form-check"> <input class="form-check-input" type="checkbox"  name=' +
                                id + ' > ' +
                                '<label class="form-check-label" for="defaultCheck1"> ' +
                                name + '</label>  </div>');
                        });

                        $('#myModal').modal('show');


                    }
                });
            }
        });
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button> --}}

    <!-- Modal -->



@endsection
