




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
<style>
    .avatar {
    height: 120px!important;
    width: 120px!!important;
    border-radius: 50%!important;
}
</style>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>


    <div id="appication" class="dashboard min-vh-100 ">
        <div class="admin ">
            <div class=" p-2 p-md-5 ">
                <div class="p-3">
                    <h5> Adicionar  educando</h5>
                    {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                        da conta de utilizador</div> --}}

                    <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">

                        @php
                        $id_user = Auth::user()->id;
                    @endphp
                        <form action="{{ url("$id_user/users/escreverFilho") }}" method="post" class="style-1"
            enctype="multipart/form-data">
         @csrf

                @include('forms._formEducando.index')
            

                <div class="py-3">
                    <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                        <div class="text-uppercase text-increase">Próximo</div>
                    </button>
                </div>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/js/sweetalert2.all.min.js"></script>

          
        
    @if (session('idade'))
    <script>
        Swal.fire(
            'Falha ao cadastrar Educando(a)!',
            'Idade inferior a 5 anos.',
            'error'
        )
    
    </script>
    @endif       
    @if (session('error2'))
    <script>
        Swal.fire(
            'Falha ao cadastrar usuário!',
            'Email existente ou senhas diferentes ',
            'error'
        )
    
    </script>
    @endif
    @if (session('error'))
    <script>
        Swal.fire(
            'Seleciona a foto!',
            '',
            'error'
        )
    
    </script>

@endif

<script>
    // var estado = 1;


    $('#password').on('keyup', function(event) {

        var senha = $("#password").val();

        var pathname = $(location).attr('pathname');

        var elemento = document.getElementById("label-senha");

        if (senha.length > 0 && senha.length <= 7 && pathname != '/login') {

            elemento.innerHTML =
                "A Senha deve conter mais de 7 carácter es composto por números e carácter es especiais";
            elemento.style.color = "red";
            // Swal.fire(
            //     'Atenção',
            //     'A palavra passe deve conter mais de 7 carácter es composto por números e carácter es especiais',
            //     'info'
            // );
            estado = 0;
        } else if (senha.length == 0) {
            elemento.innerHTML = "Senha*";
            elemento.style.color = "black";
        }
        if (senha.length > 7) {
            elemento.innerHTML = "Senha aceitável";
            elemento.style.color = "green";
        }

    });
</script>


<script>
    function containsSpecialChars(str) {
        const espaco_e_carac_especial = /[^a-zA-Z0-9]/g;

        return espaco_e_carac_especial.test(str);
    }

    let jjk = false;
    var verdadeiro = true;
    var falso = false;
    $('#vc_nomeUtilizador').on('keyup', function() {
        let user = $("#vc_nomeUtilizador").val();
        console.log("o");
        let pathname = $(location).attr('pathname');
        // console.log('kl' + user);
        let elemento = document.getElementById("label-usuario");
        let jjk = containsSpecialChars(user);
        console.log(user);

        //     var dados = $('form').serialize();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/encarregado/buscar-usuario/' + user,
            async: true
                // , data: dados
                ,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                // console.log('aaa' + response.user)

                let texto =
                    'nome de usuário não deve conter espaço em branco, acento ou carácter  especial';
                if (response.user != '') {
                    jjk = true;
                    texto = 'nome de usuário existente';

                } else {
                    elemento.innerHTML = 'Nome de usuário*';
                }
                if (jjk == true) {
                    // document.getElementById("termo").disabled = true;

                } else {
                    // document.getElementById("termo").disabled = false;

                }
                // console.log('teste' + jjk);
                jjk === true ? [elemento.style.color = "red"] : elemento.style.color = "black"
                jjk === true ? elemento.innerHTML =
                    texto : elemento.style.color = "black"

            }


        });



    });
</script>


    <script src="/site/vendor/jquery/jquery.min.js"></script>
    <script src="/site/vendor/popper/popper.min.js"></script>
    <script src="/site/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/site/assets/js/all.js"></script>

</body>