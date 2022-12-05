@extends('layouts._includes.site.app')
@section('titulo', ' Lista de classes')
@section('conteudo')
    <!-- Blog Section end -->







    <section class="_another-service   vh-100 d-flex  items-align-center  justify-content-center    ">

        <div class="service   ">
            <div class="box-72  ">
         

                <h3> A inscrição é fácil. Leva apenas alguns passos</h3>
                <form action="{{ url('users/salvar') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                        <input class="border-form w-100 btn-1" class="border-form w-100 btn-1" type="text" placeholder="Seu nome de utilizador"
                                name="vc_nomeUtilizador">
                        </div>
                        <div class="col-md-6 form-group">
                            <input class="border-form w-100 btn-1" type="text" placeholder="Seu primeiro nome"
                                name="vc_primemiroNome">
                        </div>
                        <div class="col-md-6 form-group">
                            <input class="border-form w-100 btn-1" type="text" placeholder="Seu último nome" name="vc_apelido">
                        </div>
                        <div class="col-md-6 form-group">
                            <input class="border-form w-100 btn-1" type="email" placeholder="Seu e-mail" name="vc_email">
                        </div>
                        <div class="col-md-6 form-group">
                            <input class="border-form w-100 btn-1" type="number" placeholder="Seu número" name="vc_telefone">
                        </div>
                        <div class="col-md-6 form-group">
                            <select name="vc_genero" required
                          class="border-form w-100 btn-1">
                                <option disabled value="" selected>Seleccione o género</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                           <input class="border-form w-100 btn-1" type="password" name="password" placeholder="Sua palavra passe">
                        </div>
                        <div class="col-md-6 form-group">
                           <input class="border-form w-100 btn-1" type="password" name="password_confirmation"
                                placeholder="Confirmar sua palavra passe">
                        </div>

                        <div class="col-md-6">

                            <button type="submit" class="btn-format text-white rounded    btn-blue p-2 border-0">INSCREVER-SE</button>
                        </div>
                    </div>
                </form>

                </form>
            </div>
        </div>
    </section>

@endsection
