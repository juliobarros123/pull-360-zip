@extends('layouts._includes.admin.app')

@section('titulo', 'Editar Usuário')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="text-center">Dados Pessoas do utilizador</h5>
            <hr>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="main-body">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Usuário</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Perfil do usuário</li>
                        </ol>
                    </nav>
                    <!-- /Breadcrumb -->
                    @php
                        $img = Auth::User()->profile_photo_path;
                    @endphp
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ url("storage/{$img}") }}" alt="Admin" class="rounded-circle"
                                            width="150">
                                        <div class="mt-3">
                                            <h4> {{ $user->vc_primemiroNome . ' ' . $user->vc_apelido }} </h4>
                                            <p class="text-secondary mb-1">Cidadão angolano</p>


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nome Completo</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->vc_primemiroNome . ' ' . $user->vc_apelido }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->vc_email }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Telefone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->vc_telefone }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nivel</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->vc_tipoUtilizador }}
                                        </div>
                                    </div>
                                    <hr>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn btn-info " target="__blank"
                                                href="{{ route('admin.users.editar', Auth::user()->id) }}">Editar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>



    @endsection
