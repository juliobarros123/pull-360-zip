<!DOCTYPE html>

<html lang="pt-pt">

<style>
    *::-webkit-scrollbar-thumb {
        background-color: #f8b736 !important;
    }

    .btn-menu {
        display: inline-block;
        padding: 14px 28px 13px 28px;
        line-height: 1;
        border: 2px solid #3055A5;
        font-family: "Raleway", "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: bold;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #ffffff;
        background: #3055A5;
        border-radius: 25px !important
    }

    .bt_menu {
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        padding: 6px 12px;
        font-size: 12px;
        line-height: 1.61803399;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .bt_menu:hover {
        background: none;
        color: #fff;
        border-color: #EE6633;
        background-color: #EE6633;
        transition: all .3s ease;
    }

    .menu {
        top: 9px !important;
        width: 95%;
    }


    li {
        list-style: none;
    }

    ul li a:hover {
        text-decoration: line-through;
        color: #EE6633;
        font-weight: bold
    }

    ul li a.active {
        color: #EE6633 !important
    }

    #paraCima {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 30px;
        border: none;
        outline: none;
        /* background-color: red; */
        color: #EE6633;
        cursor: pointer;
        padding: 15px;
        /* border-radius: 4px; */
        font-weight: bold;
    }

    #paraCima:hover {
        color: #3055A5;
        font-weight: bold;
    }

    @media only screen and (max-width: 1024px) {

        .increver_se {


            background: #3055A5 0% 0% no-repeat padding-box !important;
            border-radius: 27px !important;
            opacity: 1 !important;
            padding-top: 15px !important;
            color: white !important;
        }

        .li_increver_se {
            display: flex;
            justify-content: center;
            margin-left: 5% !important;

        }
    }

</style>


<head>
    <meta charset="utf-8">
    <title>Xilonga</title>
    {{-- <title>@yield('titulo')</title> --}}
    <link rel="icon" href="/images/insignia/logo1.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/site/css/flexslider.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/line-icons.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/elegant-icons.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/theme-aquatica.css" rel="stylesheet" type="text/css" media="all" />

    <link  href="/site/css/animate.css" rel="stylesheet">
    <script src="/site/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    {{-- Minhas estilizações --}}
    <link href="/site/css/font.css" rel="stylesheet" />
    <link href="/site/css/mystyle.css" rel="stylesheet" />
    <link href="/site/css/progressive-image.css" rel="stylesheet" />
      <link rel="stylesheet" href="/site/css/site.css">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css" />
    {{-- <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> --}}
    <link rel="stylesheet" href="/css/font-view-password.css">
    <!--lazy load-->
    <style>
        /* body{
          background-color: red;
      } */

    </style>
</head>

<body class="dimensao-padrao">
    <div class="loader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <div class="nav-container ">

        <nav class="top-bar ">
            <div class="container-fluid ">
                <div class="row nav-menu">
                    <div class="col-sm-3 col-md-3 columns pb-create-2 pr-3 ">
                        <a href="{{ route('xilonga') }}">
                            {{-- <img class="logo logo-light" alt="Logo" src="/images/insignia/logo_brand.png">
                            <img class="logo logo-dark" alt="Logo" src="/images/insignia/logo_brand.png"> --}}
                            <img style="top: 41px;

                            height: 76px;" class=" logo-dark" alt="Logo" src="/images/insignia/logo.svg">
                        </a>
                    </div>

                    <div class="col-sm-7 col-md-7 columns">
                        <ul class="menu mg-l">

                            <li><a href="{{ route('site.sobre') }}">Sobre</a></li>

                            {{-- <li><a href="{{ route('site.horarios') }}">Horários</a> --}}
                            {{-- <ul class=" subnav">
                                    <li><a href="{{ route('site.horarios-basico') }}">Ensino Primário</a></li>
                                    <li><a href="{{ route('site.horarios-secundario') }}">Ens.Secundário</a></li>
                                </ul> --}}
                            {{-- </li> --}}

                            {{-- <li><a class="current" href="{{ route('site.anos-escolaridade') }}">Anos de
                                    escolaridade</a></li> --}}
                            <li><a class="current" href="{{ route('site.anos-escolaridade') }}">Classes</a></li>
                            <li><a href="{{ route('site.manuais-escolares') }}">Manuais Escolares</a></li>





                            <li class="has-dropdown"><a href="#">Desafios</a>
                                <ul class="subnav">
                                    <li><a href="{{ url('desafios/quizzes/escolha/disciplinas') }}">Jogo de
                                            conhecimento</a></li>

                                </ul>
                            </li>

                            @empty(Auth::user()->vc_tipoUtilizador)
                                <li><a href="{{ route('login') }}">Entrar
                                    </a></li>
                                {{-- <li> <button style="eft: 1618px;
                                                                                    width: 162px;
                                                                                    height: 47px;border-radius:25px!important;margin-top: -15px;
                            margin-left: 73px;" color="#3055A5" type="button"
                                        class="bt_menu  btn-menu   btn-filled">Inscreva-se</button>
                                </li> --}}

                            @else
                                <li><a href="{{ route('home') }}"><b class="text-success">Painel</b></a></li>
                            @endempty
                        </ul>


                    </div>
                    <div class="col-sm-2  columns">

                        @empty(Auth::user()->vc_tipoUtilizador)

                            <li class="li_increver_se">
                                <a style="padding-top: 8px" href="encarregado/registrar" color="#3055A5"
                                    class="bt_menu  btn-menu   btn-filled increver_se" id="increve_sa">Inscreva-se</a>

                            </li>

                        @else
                            <li></li>
                        @endempty
                    </div>
                </div>
                <!--end of row-->

                <div class="mobile-toggle">
                    <i class="icon icon_menu"></i>
                </div>

            </div>
            <!--end of container-->
        </nav>
    </div>
