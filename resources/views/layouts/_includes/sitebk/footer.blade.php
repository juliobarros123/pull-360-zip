<style>
    .p-3-custom {
        padding: 2rem !important
    }

    .container-fluid {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto
    }

    .pl-4,
    .px-4 {
        padding-left: 1.5rem !important
    }

    .linha {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px
    }

    .my-3 {
        margin-top: 1rem !important
    }

    .text-center {
        text-align: center !important
    }

    .social-media>img {
        float: right;
        margin: 0px 10px;
    }

    .float-right {
        float: right !important;

    }

    .img_espaco_right {
        margin-right: 20% !important;
    }

    .img_espaco_right_img {
        margin-right: 1% !important;
    }

    .mg-l {
        margin-left: 10%;
    }

    .footer-dev {
        font-size: 3px;
        /* text-align: left !important; */
        font: normal normal bold 20px/22px Archivo !important;
        letter-spacing: 0px !important;
        color: #ee6633 !important;
        opacity: 1 !important;

    }


    .footer-new {

        background-color: white !important;

    }

    .content-center {
        display: flex;
        justify-content: center;
    }

    

</style>
<footer class="footer-new p-3 ">

    <div class="container-fluid ">
        <div class="linha p-3-custom row content-center">

            <div class="col-sm-4 ">
                <p class="footer-words text-center  "> <small class="" style="font-size: 500%;">© Todos os
                        Direitos Reservados {{ date('Y') }}-Xilonga</small></p>

            </div>
            <div class="col-sm-4 ">




            </div>
            <div class="col-sm-4 content-center">
                <img src="{{ asset('/images/SVG/facebook (1).svg') }}" class=" " alt="" style="margin-left: 2%;">
                <img src="{{ asset('/images/SVG/instagram.svg') }}" class=" " alt="" style="margin-left: 2%;">
                <img src="{{ asset('/images/SVG/linkedin.svg') }}" class="  " alt="" style="margin-left: 2%;">
                <img src="{{ asset('/images/SVG/youtube.svg') }}" class=" " alt="" style="margin-left: 2%;">
            </div>

        </div>

        {{-- <div class="col-12 col-lg-12 linha">

            <p class="footer-words  text-center">Desenvolvido por  <a href="https://www.itel.gov.ao/">ITEL</a> </p>


        </div> --}}

    </div>


</footer>


{{-- <div class="main" id="myBtn">
    <h2>Section 2</h2>
    <a href="#section1">Click Me to Smooth Scroll to Section 1 Above</a>
</div> --}}

<span id="paraCima"><i style="font-weight: bold;" class="icon arrow_carrot-up_alt2"></i> </span>


<script src="/site/js/jquery.min.js"></script>
<script src="/site/js/jquery.plugin.min.js"></script>
<script src="/site/js/bootstrap.min.js"></script>
<script src="/site/js/jquery.flexslider-min.js"></script>
<script src="/site/js/smooth-scroll.min.js"></script>
<script src="/site/js/skrollr.min.js"></script>
<script src="/site/js/spectragram.min.js"></script>
<script src="/site/js/scrollReveal.min.js"></script>
<script src="/site/js/isotope.min.js"></script>
<script src="/site/js/twitterFetcher_v10_min.js"></script>
<script src="/site/js/lightbox.min.js"></script>
<script src="/site/js/jquery.countdown.min.js"></script>
<script src="/site/js/scripts.js"></script>
{{-- Meus scrypts --}}
<script type="text/javascript" src="/slick/slick.min.js"></script>
{{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}
<script src="/site/js/myscript.js">

</script>
<script>
    function mudar(id) {
        var x = document.getElementById(id);
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

</script>
<script>
    $("#termo").change(function() {
       
        // console.log($( "#termo" ).is(':checked')===true);
        if ($("#termo").is(':checked') === true) {

            $("#botao-proximo").attr("disabled", false);
            $("#termo_assinado").click();
          

            
        } else {
            $("#termo_assinado").click();
            $("#botao-proximo").attr("disabled", true);
           

        }
    });

</script>

<script>
    
//    $('.tool').hover( function() { 
    $(document).on("mouseover", ".tool", function(){    
    
       
        ($("#termo").is(':checked') === true)? document.getElementById("tool").removeAttribute("title"):document.getElementById("tool").setAttribute("title", "para prosseguir, aceite os termos e condições");
       
    });

</script>


@include('layouts._includes.site.data_nascimento.validacao')
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

<script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
<script>
    // var estado = 1;
    $('#password').on('keyup', function() {
        var email = $("#password").val();
        console.log("o");
        var pathname = $(location).attr('pathname');
        console.log(pathname);
        var elemento = document.getElementById("span-senha");
        if (email.length > 0 && email.length < 7 && pathname != '/login') {
            elemento.innerHTML =
                "A Senha deve conter mais de 7 carácter es composto por números e carácter es especiais";
            elemento.style.color = "red";
            // Swal.fire(
            //     'Atenção',
            //     'A palavra passe deve conter mais de 7 carácter es composto por números e carácter es especiais',
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
    function containsSpecialChars(str) {
        const espaco_e_carac_especial = /[^a-zA-Z0-9]/g;

        return espaco_e_carac_especial.test(str);
    }

    let jjk = false;
    var verdadeiro = true;
    var falso = false;
    $('#vc_nomeUtilizador').on('keyup', function() {
        let user = $("#vc_nomeUtilizador").val();
        // console.log("o");
        let pathname = $(location).attr('pathname');
        // console.log('kl' + user);
        let elemento = document.getElementById("span-user");
        let jjk = containsSpecialChars(user);
        console.log(jjk);

        var dados = $('form').serialize();

        $.ajax({
            type: 'GET'
            , dataType: 'json'
            , url: `/encarregado/buscar-usuario/${user}`
            , async: true
            , data: dados,

            success: function(response) {

                // console.log('aaa' + response.user)

                let texto = 'nome de usuário não deve conter espaço em branco, acento ou carácter  especial';
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


<!-- lazy load -->
<script src="https://cdn.jsdelivr.net/npm/progressive-image.js/dist/progressive-image.js"></script>

<script>
    $(function() {
        //Script de ativação de menu da pagina currente

        const url = location.href;
        const menuItem = $('a');
        const menuLength = menuItem.length;
        // console.log(menuItem)
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === url) {
                menuItem[i].className = 'active';

            }
        }
    });

</script>

<script>
    $(function() {
        var mybutton = document.getElementById("paraCima");
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // Add smooth scrolling to all links
        $("#paraCima").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: 0
                }, 800, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });

</script>



</body>

</html>
