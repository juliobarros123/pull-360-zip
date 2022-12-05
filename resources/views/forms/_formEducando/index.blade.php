
                    <div class="col-12">
                        <div class="avatar-container mb-5 d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-start">
                            <img src="/site/assets/img/noPerson.png" alt="Imagem de Perfil" class="avatar mr-0 mr-md-4">
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
                                    name="vc_BI" value="{{ old('vc_BI') }}" maxlength="14" autocomplete="vc_BI"
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


                        <div id="agente" class="form-group col-md-4">




                            @error('it_num_agente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                    
                        </div>
                    </div>
                @include('layouts._includes.admin.data_nascimento.validacaoFilho')