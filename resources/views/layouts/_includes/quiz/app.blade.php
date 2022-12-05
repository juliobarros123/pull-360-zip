<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>   
    <link rel="stylesheet" href="/css/quizz/style.css">
    {{-- <link rel="stylesheet" href="/site/quiz/css/bootstrap.min.css" > --}}
    <script src="/site/quiz/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="/site/quiz/js/popper.min.js" ></script>
  
    <link rel="stylesheet" href="/css/bootstrap-4.0.0-dist/js/bootstrap.min.js">
    {{-- <link rel="stylesheet" href="/site/quiz/css/font-awesome.min.css"> --}}

    <link rel="stylesheet" href="/quiz/css/mystyle.css">
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="/quiz/css/bootstrap.min.css">
    <link rel="stylesheet" href="/quiz/css/font-awesome.css">
    <link rel="stylesheet" href="/quiz/fonts/font-awesome-4.7/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/quiz/fonts/font-awesome-5/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="/quiz/css/index.css">


    {{-- <link href="/site/css/theme-aquatica.css" rel="stylesheet" type="text/css" media="all" /> --}}
    {{--


    <script src="/site/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    {{-- Minhas estilizações 
    <link href="/site/css/font.css" rel="stylesheet" /> --}}
   

    <link rel="stylesheet" href="/quiz/css/mystyle.css">
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
   
   

</head>

<body class="" style="">
    @include('layouts._includes.quiz.nav')
    @yield('conteudo')
    @include('layouts._includes.quiz.footer')

</body>




</html>
