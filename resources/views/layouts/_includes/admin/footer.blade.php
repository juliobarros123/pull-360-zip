<style>
    .text-branco{
        color:white!important;
    }
</style>
<footer class="footer-container py-3" style="background: white!important">
  <div class="container">
      <div class="d-flex justify-content-between align-items-center">
          <div class="text-main reserved-rights">© Todos os Direitos Reservados 2021 - Xilonga</div>
          <ul class="list-unstyled d-flex m-0">
              <li class="social-item mx-2"> <a
                      class="text-decoration-none d-block rounded-circle bg-main text-secondary d-flex align-items-end justify-content-center"
                      href="#"><i class="fab fa-facebook-f text-branco" style="font-size: 16px;"></i></a>

              </li>
              <li class="social-item mx-2"> <a
                      class="text-decoration-none d-block rounded-circle bg-main text-secondary d-flex align-items-center justify-content-center"
                      href="#"><i class="fab fa-instagram text-branco"></i></a>

              </li>
              <li class="social-item mx-2"> <a
                      class="text-decoration-none d-block rounded-circle bg-main text-secondary d-flex align-items-center justify-content-center"
                      href="#"><i class="fab fa-linkedin-in text-branco"></i></a>

              </li>
              <li class="social-item mx-2"> <a
                      class="text-decoration-none d-block rounded-circle bg-main text-secondary d-flex align-items-center justify-content-center"
                      href="#"><i class="fab fa-youtube text-branco"></i></a>

              </li>
          </ul>
      </div>
  </div>
</footer>



<script src="/js/jquery.min.js"></script>

<script>
        $("#termo").click(function() {
           

            if ($("#termo").is(':checked') === true) {
    
                $("#botao-proximo").attr("disabled", false);
                $("#termo_assinado").click();
              console.log("oa");
    
                
            } else {
                $("#termo_assinado").click();
                $("#botao-proximo").attr("disabled", true);
                console.log("não");
    
            }
        });
    
    </script>

@if (session('status_demo'))
    <script>
        Swal.fire(
            'Cadastro finalizado com sucesso!',
            '',
            'success'
        )

    </script>
@endif


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
                type: 'GET'
                , dataType: 'json'
                , url: '/encarregado/buscar-usuario/'+user
                , async: true
                // , data: dados
                ,headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function(response) {
    
                    // console.log('aaa' + response.user)
    
                    let texto = 'nome de usuário não deve conter espaço em branco, acento ou caracter especial';
                    if (response.user != '') {
                        jjk = true;
                        texto = 'nome de usuário existente';     
    
                    } else {
                        elemento.innerHTML = 'Nome de usuário*';
                    }
                    if(jjk==true){
                        document.getElementById("termo").disabled = true;
                       
                    }else{
                        document.getElementById("termo").disabled = false;
                       
                    }
                    // console.log('teste' + jjk);
                    jjk === true ? [elemento.style.color = "red"]: elemento.style.color = "black"
                    jjk === true ? elemento.innerHTML =
                        texto : elemento.style.color = "black"              
    
                }
    
    
            });
    
    
    
        });
    
    </script>


<script>
        let btn = document.querySelector('.lnr-eye');
    
        btn.addEventListener('click', function() {
    
            let input = document.querySelector('#password');
    
            if (input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
            } else {
                input.setAttribute('type', 'password');
            }
    
        });
        let view_pass_confirm = document.querySelector('.view-pass-confirm');
        view_pass_confirm.addEventListener('click', function() {
    
            let input = document.querySelector('#password_confirm');
    
            if (input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
            } else {
                input.setAttribute('type', 'password');
            }
    
        });
    
    </script>

    <script>
        // var estado = 1;
        $('#password').on('keyup', function() {
            var email = $("#password").val();
           
            var pathname = $(location).attr('pathname');
            console.log(pathname);
            var elemento = document.getElementById("span-senha");
            if (email.length > 0 && email.length < 7 && pathname != '/login') {
                elemento.innerHTML =
                    "A Senha deve conter mais de 7 caracteres composto por números e caracteres especiais";
                elemento.style.color = "red";
                // Swal.fire(
                //     'Atenção',
                //     'A palavra passe deve conter mais de 7 caracteres composto por números e caracteres especiais',
                //     'info'
                // );
                estado = 0;
            } else if (email.length == 0) {
                elemento.innerHTML = "Senha";
                elemento.style.color = "black";
            }
            if (email.length > 7) {
                elemento.innerHTML = "Senha aceitável";
                elemento.style.color = "green";
            }
    
        });
    
    </script>
    

    <script>
        let btn = document.querySelector('.lnr-eye');
    
        btn.addEventListener('click', function() {
    
            let input = document.querySelector('#password');
    
            if (input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
            } else {
                input.setAttribute('type', 'password');
            }
    
        });
        let view_pass_confirm = document.querySelector('.view-pass-confirm');
        view_pass_confirm.addEventListener('click', function() {
    
            let input = document.querySelector('#password_confirm');
    
            if (input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
            } else {
                input.setAttribute('type', 'password');
            }
    
        });
    
    </script>
 
    <script>
        // var estado = 1;
        $('#password').on('keyup', function() {
            var email = $("#password").val();
           
            var pathname = $(location).attr('pathname');
            console.log(pathname);
            var elemento = document.getElementById("span-senha");
            if (email.length > 0 && email.length < 7 && pathname != '/login') {
                elemento.innerHTML =
                    "A Senha deve conter mais de 7 caracteres composto por números e caracteres especiais";
                elemento.style.color = "red";
                // Swal.fire(
                //     'Atenção',
                //     'A palavra passe deve conter mais de 7 caracteres composto por números e caracteres especiais',
                //     'info'
                // );
                estado = 0;
            } else if (email.length == 0) {
                elemento.innerHTML = "Senha";
                elemento.style.color = "black";
            }
            if (email.length > 7) {
                elemento.innerHTML = "Senha aceitável";
                elemento.style.color = "green";
            }
    
        });

        
    
    </script>
    <script>


    </script>

@include('layouts._includes.site.data_nascimento.validacao')
