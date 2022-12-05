<!DOCTYPE html>
<html lang="pt">

@include('layouts._includes.admin.head')

<body>
    <div class="justify-content-end  d-flex">
        <a class="nav-link text-danger" href="{{ route('logout') }}" id="sessao"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Terminar a Sessão
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>


    <div id="appication" class="dashboard min-vh-100 ">
        <div class="admin ">
            <div class=" p-2 p-md-5 ">
                <div class="p-3">
                    <h5> INSERIR DADOS ESCOLARES</h5>
                    {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                        da conta de utilizador</div> --}}

                    <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                        <form action="{{ url('/matricula/cadastrar_demo') }}" method="post">
                            @csrf


                            @include('forms._formMatricula.index')


                            <div class="py-3">
                                <button type="submit"
                                    class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                                    <div class="text-uppercase text-increase">Finalizar cadastro</div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/js/sweetalert2.all.min.js"></script>



    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar Educando !',
                'O aluno já existe neste ou faltou inserir um dado inerete ao cadastro!',
                'error'
            )
        </script>
    @endif

    @if ($sim == 0)
        <script>
            Swal.fire(
                'Não poderá cadastrar a Matrícula!',
                'Para matricular alguém é preciso cadastrar um educando, classe, ano lectivo e uma escola!',
                'error'
            )
        </script>
    @endif





    <script src="/site/vendor/jquery/jquery.min.js"></script>
    <script src="/site/vendor/popper/popper.min.js"></script>
    <script src="/site/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/site/assets/js/all.js"></script>

</body>
