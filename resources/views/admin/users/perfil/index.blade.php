@extends('layouts._includes.admin.app')

@section('titulo', 'Dados pessoais do utilizador')

@section('conteudo')

    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <div class="col">
                <h5 class="mb-5">Dados pessoais do utilizador</h5>
            </div>
            <div class="d-flex w-100 flex-wrap ">
                <div class="card col-md-12" style="border:none;">
                    <div class="card-body" >
                        <div class="container" >
                            <div class="main-body">

                                <!-- Breadcrumb -->
                               {{--  <nav aria-label="breadcrumb" class="main-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Usuário</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Perfil do usuário</li>
                                    </ol>
                                </nav> --}}
                                <!-- /Breadcrumb -->
                                @php
                                    $img = Auth::User()->profile_photo_path;
                                @endphp
                                <div class="row gutters-sm">
                                    <div class="col-md-4 mb-3">
                                        <div class="card card-img" style="">
                                            <div class="card-body card-img-body {{(Auth::User()->vc_tipoUtilizador == 'Professor')?'bg-azul':''}} {{(Auth::User()->vc_tipoUtilizador == 'Filho')?'bg-laranja':''}}"  style="">
                                                <div class="d-flex flex-column align-items-center text-center {{(Auth::User()->vc_tipoUtilizador == 'Professor')?'bg-azul':''}} {{(Auth::User()->vc_tipoUtilizador == 'Filho')?'bg-laranja':''}}">
                                                    <img src="{{ url("storage/{$img}") }}" alt="Admin"
                                                        class="rounded-circle mt-3" width="150">
                                                    <div class="mt-3">
                                                        <h4 class="{{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'text-white':''}}"> {{ $user->vc_primemiroNome . ' ' . $user->vc_apelido }} </h4>
                                                        <p class=" mb-1 {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'text-white':'text-secondary'}}">{{ $user->vc_genero=='Feminino'?'cidadã angolana':'Cidadão angolano'  }}</p>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-8">
                                        <div class="card mb-3 card-dados" style="">
                                            <div class="card-body" >
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 {{(Auth::User()->vc_tipoUtilizador == 'Professor')?'text-azul':''}} {{(Auth::User()->vc_tipoUtilizador == 'Filho')?'text-laranja':''}}">Nome Completo</h6>
                                                    </div>
                                                    <div class="col-sm-9  {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'text-cinza':'text-secondary'}}">
                                                        {{ $user->vc_primemiroNome . ' ' . $user->vc_apelido }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 {{(Auth::User()->vc_tipoUtilizador == 'Professor')?'text-azul':''}} {{(Auth::User()->vc_tipoUtilizador == 'Filho')?'text-laranja':''}}" >Email</h6>
                                                    </div>
                                                    <div class="col-sm-9  {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'text-cinza':'text-secondary'}}">
                                                        {{ $user->vc_email }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 {{(Auth::User()->vc_tipoUtilizador == 'Professor')?'text-azul':''}} {{(Auth::User()->vc_tipoUtilizador == 'Filho')?'text-laranja':''}}">Telefone</h6>
                                                    </div>
                                                    <div class="col-sm-9  {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'text-cinza':'text-secondary'}}">
                                                        {{ $user->vc_telefone }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 {{(Auth::User()->vc_tipoUtilizador == 'Professor')?'text-azul':''}} {{(Auth::User()->vc_tipoUtilizador == 'Filho')?'text-laranja':''}}">Nível</h6>
                                                    </div>
                                                    <div class="col-sm-9 {{(Auth::User()->vc_tipoUtilizador == 'Professor' || Auth::User()->vc_tipoUtilizador == 'Filho')?'text-cinza':'text-secondary'}}">
                                                        {{ $user->vc_tipoUtilizador }}
                                                    </div>
                                                </div>
                                                <hr>

                                               
                                                @if (!(Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno'))
                                                <div class="row">
                                                    <div class="col-sm-12 text-center" style="margin-top: 30px;">
                                                        <a class="btn  {{(Auth::User()->vc_tipoUtilizador == 'Professor')?'bg-azul text-white':'btn-info'}} " target="__blank"
                                                            href="{{ route('admin.users.editar', Auth::user()->id) }}" style="width: 158px;
                                                            height: 40px;border-radius: 27px;">Editar</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>











    <script src="/js/sweetalert2.all.min.js"></script>
    
    @if (session('status'))
        <script>
            Swal.fire(
                'Utilizador Cadastrado com sucesso!',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar Utilizador!',
                'Email existente ou senhas diferentes ou mesmo nome de usuário existente',
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
