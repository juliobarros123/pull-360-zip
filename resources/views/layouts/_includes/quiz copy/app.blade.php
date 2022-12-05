<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>   
    <link rel="stylesheet" href="/css/quizz/style.css">
    <link rel="stylesheet" href="/site/quiz/css/bootstrap.min.css" >
    <script src="/site/quiz/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="/site/quiz/js/popper.min.js" ></script>
  
    <link rel="stylesheet" href="/css/bootstrap-4.0.0-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="/site/quiz/css/font-awesome.min.css">

</head>

<body class="" style="">
    @include('layouts._includes.quiz.nav')
    @yield('conteudo')
    @include('layouts._includes.quiz.footer')
</body>




</html>
