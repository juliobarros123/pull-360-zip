



@extends('layouts._includes.admin.app')

@section('titulo', 'Editar Utilizador')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Editar utilizador</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">
           

                <form  action="{{ route('admin.users.atualizar', $user->id) }}" method="post" class="style-1" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <div class="avatar-container mb-5 d-flex align-items-center">
                            <img src="/site/assets/img/noPerson.png" alt="Imagem de Perfil" class="avatar mr-4">
                            <div>
                                <label class="btn btn-sm px-3 rounded-pill text-secondary border border-secondary" for="avatar">Carregar
                                    fotografia</label>
                                <input type="file" class="d-none" id="avatar" name="foto">
                            </div>
                        </div>
                        <div class="row">
                    
                            <div class="form-group col-md-4 ">
                                <label class="bold" id="label-usuario" for="username">Nome de usuário*</label>
                                <input type="text" class="form-control bg-white rounded-pill "
                                    value="{{ isset($user->vc_nomeUtilizador) ? $user->vc_nomeUtilizador : '' }}" id="vc_nomeUtilizador"
                                    name="vc_nomeUtilizador" placeholder="Nome">
                            </div>
                    
                    
                            <div class="form-group col-md-4">
                                <label class="bold" for="username">{{ __('Primeiro nome*') }}</label>
                                <input type="text" class="form-control bg-white rounded-pill " id="vc_primemiroNome"
                                    value="{{ isset($user->vc_primemiroNome) ? $user->vc_primemiroNome : '' }}" id="vc_primemiroNome"
                                    name="vc_primemiroNome" placeholder="Primeiro nome">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="bold" for="username">{{ __('Sobrenome*') }}</label>
                                <input value="{{ isset($user->vc_apelido) ? $user->vc_apelido : '' }}" id="vc_apelido" type="text"
                                    placeholder="Apelido"
                                    class="form-control bg-white rounded-pill @error('vc_apelido') is-invalid @enderror" name="vc_apelido"
                                    value="{{ old('vc_apelido') }}" required autocomplete="vc_apelido" autofocus>
                            </div>
                    
                            
                            <div class="form-group col-md-4">
                                <label class="bold" for="username">{{ __('Número de telefone') }}</label>
                                <input value="{{ isset($user->vc_telefone) ? $user->vc_telefone : '' }}" id="vc_tipoUtilizador"
                                    id="vc_telefone" placeholder="Telefone" type="number" min="900000000" maxlength="9"
                                    class="form-control bg-white rounded-pill @error('vc_telefone') is-invalid @enderror" name="vc_telefone"
                                    value="{{ old('vc_telefone') }}" autocomplete="vc_telefone" placeholder="9xx xxx xxx" autofocus>
                    
                                @error('vc_telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    
                            <div class="form-group col-md-4">
                                <label class="bold" for="username">{{ __('E-mail*') }}</label>
                                <input value="{{ isset($user->vc_email) ? $user->vc_email : '' }}" id="email" type="email"
                                    placeholder="nome@email.com"
                                    class="form-control bg-white rounded-pill @error('email') is-invalid @enderror" name="vc_email"
                                    value="{{ old('vc_email') }}" required autocomplete="vc_email">
                    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    
                            <div class="form-group col-md-4">
                                <label class="bold" for="lastname">{{ __('Número de bilhete de Identidade') }}</label>
                                <input value="{{ isset($user->vc_BI) ? $user->vc_BI : '' }}" id="vc_BI" type="text"
                                    placeholder="Número de bilhete de Identidade"
                                    class="form-control bg-white rounded-pill @error('vc_BI') is-invalid @enderror" name="vc_BI"
                                    value="{{ old('vc_BI') }}" maxlength="14" autocomplete="vc_BI" autofocus>
                            </div>
                    
                            <div class="form-group col-md-4">
                                <label class="bold" for="lastname">{{ __('Género*') }}</label>
                                <select type="text" class="form-control bg-white rounded-pill" name="vc_genero" required>
                                    @isset($user)
                                        <option value="{{ isset($user->vc_genero) ? $user->vc_genero : '' }}">
                                            {{ $user->vc_genero }}</option>
                                    @else
                                        <option disabled value="" selected>Seleccione o género</option>
                                    @endisset
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                </select>
                            </div>
                    
                            <div class="form-group col-md-4">
                                <label class="bold" id="label_data_nascimento"
                                    for="lastname">{{ __('Data de nascimento') }}</label>
                                <input value="{{ isset($user->dt_data_nascimento) ? $user->dt_data_nascimento : '' }}"
                                    id="id_data_nascimento" type="date"
                                    class="form-control bg-white rounded-pill @error('dt_data_nascimento') is-invalid @enderror"
                                    name="dt_data_nascimento" required autocomplete="dt_data_nascimento" max="{{ date('Y') - 18 }}-01-01"
                                    autofocus>
                    
                                @error('dt_data_nascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    
                    
                            <div class="form-group col-md-4">
                                <label class="bold" for="date">{{ __('Nível*') }}</label>
                                <select id="id_user" type="text" class="form-control bg-white rounded-pill" name="vc_tipoUtilizador"
                                    required>
                                    @isset($user)
                    
                                        <option value="{{ isset($user->vc_tipoUtilizador) ? $user->vc_tipoUtilizador : '' }}">
                                            {{ $user->vc_tipoUtilizador }}</option>
                                    @else
                                        @if (Auth::User()->vc_tipoUtilizador != 'Chefe departamento provincial' || Auth::User()->vc_tipoUtilizador != 'Diretor Municipal')
                                            <option disabled value="" selected>Selecciona o nível de acesso</option>
                                        @endif
                                    @endisset
                    
                                    @if (Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Administrador')
                                        <option value="Administrador">Administrador</option>
                                        <option value="Professor">Professor</option>
                                        <option value="Gestor_conteudo">Gestor de Conteúdo
                                        </option>
                                        <option value="Encarregado">Encarregado</option>
                                        {{-- <option value="Aluno">Aluno</option> --}}
                                        <option value="Chefe departamento provincial">Chefe departamento provincial
                                        </option>
                                        <option value="Diretor Municipal"> Director Municipal</option>
                                        @if (Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
                                            <option value="Desenvolvedor">Desenvolvedor</option>
                                        @endif
                    
                                    @endif
                    
                                    @if (Auth::User()->vc_tipoUtilizador == 'Encarregado')
                                        <option value="Filho">Educando</option>
                                    @endif
                                    @if (Auth::User()->vc_tipoUtilizador == 'Diretor Municipal')
                                        <option selected value="Professor">Professor</option>
                                    @endif
                                </select>
                            </div>
                    
                    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    
                            <div id="id_agente" class="form-group col-md-4">
                    
                    
                    
                    
                                @error('it_num_agente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    
                            </div>
                        </div>
                    
                    
                    
                    </div>
                
                    
                    <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                        <div class="text-uppercase text-increase">Editar</div>
                    </button>
                </form>

            </div>
        </div>
    </div>
     <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('status'))
        <script>
            Swal.fire(
                'Dados Actualizados com sucesso',
                '',
                'success'
            )

        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao actualizar os dados!',
                '',
                'error'
            )

        </script>
    @endif
    
    @if (session('error'))
    <script>
        Swal.fire(
            'Falha ao cadastrar Utilizador!',
            'Não carregou a foto de Utilizador ou email já está sendo utilizado!',
            'error'
        )
    </script>


@endif


<script>
    $("#id_user").on("change", function() {

        let user = $("#id_user").val();

        $("#id_agente").empty();
        if (user == "Professor") {
            console.log(user);
            $("#id_agente").append(
                "" +
                '<label class="bold" for="it_num_agente">Número de Agente*</label>' +
                '<input type="number" id="it_num_agente"' +
                'class="form-control  rounded-pill input" name="it_num_agente"' +
                'required autocomplete="it_num_agente" placeholder="Digita aqui o número de agente">'
            ).fadeIn()

        } else(
            $("#id_agente").fadeOut()
        )

    });
</script>

@if (session('editado'))
<script>
    Swal.fire(
        'Utilizador Editado com Sucesso!',
        '',
        'success'
    )
</script>
@endif
@endsection
