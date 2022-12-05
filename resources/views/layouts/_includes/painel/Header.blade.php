<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/images/insignia/logo1.png">
    <title>@yield('titulo')</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="/painel/css/simplebar.css">
    <!-- Fonts CSS -->

    {{-- <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

   
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/painel/css/feather.css">
    <link rel="stylesheet" href="/painel/css/font.css">
    <link rel="stylesheet" href="/painel/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/painel/css/style.css">
    <link rel="stylesheet" href="/painel/css/select2.css">
    <link rel="stylesheet" href="/painel/css/dropzone.css">
    <link rel="stylesheet" href="/painel/css/uppy.min.css">
    <link rel="stylesheet" href="/painel/css/jquery.steps.css">
    <link rel="stylesheet" href="/painel/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/painel/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/painel/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="/painel/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="/painel/css/app-dark.css" id="darkTheme" disabled>
<link rel="stylesheet" href="/painel/css/painel.css">
    {{-- <link rel="stylesheet" href="css/sweetalert.css"> --}}
    <link rel="stylesheet" href="/painel/fonts/font-awesome/font.css" >
    <link rel="stylesheet" href="/css/videopalyer.css">
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script> --}}
    <script src='/painel/js/jquery.lazyload.js'></script>
    <script src='/painel/js/ajax.libs.jquery.1.9.1.jquery.js'></script>
    <link rel="stylesheet" href="/css/font-view-password.css">
    <link rel="stylesheet" href="/painel/css/animate.css">

    
</head>



<body class="vertical light" style=" ">
    <div class="wrapper" class="betterBackground">
