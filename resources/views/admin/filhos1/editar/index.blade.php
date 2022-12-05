




@extends('layouts._includes.admin.app')

@section('titulo', 'Transformar filho em educando')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Transformar filho em educando</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">
                <form class="style-1" action="{{ route('filhos.atualizar', $user->id) }}" method="post"  enctype="multipart/form-data">
                    @method('put')
                    @csrf
    
             
                    <div class="col-12">
                        <div class="avatar-container mb-5 d-flex align-items-center">
                            <img src="/site/assets/img/noPerson.png" alt="Imagem de Perfil" class="avatar mr-4" style="
                            height: 120px;
                            width: 120px;
                            border-radius: 50%;
                        ">
                            <div>
                                <label class="btn btn-sm px-3 rounded-pill text-secondary border border-secondary"
                                    for="avatar">Carregar fotografia</label>
                                <input type="file" class="d-none" id="avatar"name="foto">
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-4 ">
                                <label class="bold" id="label-usuario" for="username">Nome de usuário*</label>
                                <input type="text" class="form-control bg-white rounded-pill " 
                                    value="{{ isset($user->vc_nomeUtilizador) ? $user->vc_nomeUtilizador : '' }}"
                                    id="vc_nomeUtilizador" name="vc_nomeUtilizador" placeholder="Nome">
                            </div>


                            <div class="form-group col-md-4">
                                <label class="bold" for="username">{{ __('Primeiro nome*') }}</label>
                                <input type="text" class="form-control bg-white rounded-pill " id="vc_primemiroNome"
                                    value="{{ isset($user->vc_primemiroNome) ? $user->vc_primemiroNome : '' }}"
                                    id="vc_primemiroNome" name="vc_primemiroNome" placeholder="Primeiro nome">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="bold" for="username">{{ __('Sobrenome*') }}</label>
                                <input value="{{ isset($user->vc_apelido) ? $user->vc_apelido : '' }}" id="vc_apelido"
                                    type="text" placeholder="Apelido"
                                    class="form-control bg-white rounded-pill @error('vc_apelido') is-invalid @enderror"
                                    name="vc_apelido" value="{{ old('vc_apelido') }}" required autocomplete="vc_apelido"
                                    autofocus>
                            </div>

                  

                            <div class="form-group col-md-4">
                                <label class="bold"
                                    for="lastname">{{ __('Número de bilhete de identidade') }}</label>
                                <input value="{{ isset($user->vc_BI) ? $user->vc_BI : '' }}" id="vc_BI" type="text"
                                    placeholder="Número de bilhete de identidade"
                                    class="form-control bg-white rounded-pill @error('vc_BI') is-invalid @enderror"
                                    name="vc_BI" value="{{ old('vc_BI') }}" minlength="4" autocomplete="vc_BI"
                                    autofocus>
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
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="bold" id="label_data_nascimento_filho" for="lastname">{{ __('Data de nascimento') }}</label>
                                <input value="{{ isset($user->dt_data_nascimento) ? $user->dt_data_nascimento : '' }}"
                                    id="id_data_nascimento_filho" type="date"
                                    class="form-control bg-white rounded-pill @error('dt_data_nascimento') is-invalid @enderror"
                                    name="dt_data_nascimento" required autocomplete="dt_data_nascimento"
                                    max="{{date('Y')-5}}-01-01" autofocus>

                                @error('dt_data_nascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="form-group col-md-4 toggle-password">
                                <label class="bold" for="phone" id="label-senha">{{ __('Senha*') }}</label>
                                <input id="password" type="password"
                                    class="form-control  rounded-pill input-- @error('password') is-invalid @enderror"
                                    placeholder="Senha" name="password" required autocomplete="new-password"
                                    placeholder="Senha">
                                <i class="fas fa-eye text-muted toggler"></i>
                            </div>

                            <div class="form-group col-md-4 toggle-password">
                                <label class="bold" for="phone">{{ __('Confirmar a senha*') }}</label>
                                <input id="password" type="password"
                                    class="form-control  rounded-pill input-- @error('password') is-invalid @enderror"
                                    placeholder="Confirmar senha" name="confirm_password" required autocomplete="new-password"
                                 >
                                <i class="fas fa-eye text-muted toggler"></i>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                     
                    </div>
         


                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Finalizar</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('editado'))
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


@endsection
