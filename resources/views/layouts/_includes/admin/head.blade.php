<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="/site/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/site/vendor/slick/slick.css" />
    <link rel="stylesheet" href="/site/vendor/slick/slick-theme.css" />
    <link rel="stylesheet" href="/site/assets/css/style.css" />
    <link rel="icon" href="/site/assets/img/icon.png" />
    <link href="/site/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
    <script src="/site/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/site/vendor/chart.js"></script>
 
  <script src="/js/fontawesome.js" ></script>
        <script src="/site/vendor/jquery/jquery.min.js"></script>
        <link rel="stylesheet" href="/fonts/font1.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="/css/select2.min.css" rel="stylesheet" />
<script src="/js/select2.min.js"></script>
<link rel="stylesheet" href="/painel/css/style.css">
    <title>@yield('titulo')</title>
    @include('layouts._includes.admin.datatables.css')

</head>