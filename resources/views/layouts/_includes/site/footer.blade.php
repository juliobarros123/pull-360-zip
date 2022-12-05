    <!-- Scripts -->
    <footer class="footer pb-0 ">
        <div class="d-flex justify-content-center social-media-whatsap  ">
            <div class="w-50 d-flex justify-content-end  ">

                <a href="" target="_blank"><img src="/assets/images/icon/Icon - Whatsapp.svg" class="icon-whatsap"
                        alt=""></a>
            </div>

        </div>

        <div class=" w-100 service ">

            <div class="box-72 mt-5 mb-3 d-flex flex-wrap flex-row  justify-content-around">
                <div class="another-service-box    ">
                    <ul class="p-0">
                        <li class="size-text-13 _text-color-3"> <a href="">SOBRE NÓS</a></li>
                        <li class="size-text-13 _text-color-3"><a href="">QUEM SOMOS</a></li>
                        <li class="size-text-13 _text-color-3"> <a href=""><img
                                    src="/assets/images/PUL_306º_LOGO/PUL_306º_LOGO_NEUTRO/PUL360º_BRANCO-V-2.png"
                                    alt=""></a></li>
                    </ul>
                </div>
                <div class="another-service-box  ">

                    <ul class="p-0">
                        <li class="size-text-13 "><a href="">NOSSOS SERVIÇOS</a></li>
                        <li class="size-text-13"><a href="">NOSSA POLÍTICA</a></li>
                        <li class="size-text-13"><a href="">TERMOS E CONDIÇÕES</a>
                        <li>
                        <li class="size-text-13"><a href="">VENDAS E DEVOLUÇÕES</a></li>
                    </ul>
                </div>
                <div class="another-service-box ">

                    <ul class="p-0">
                        <li class="size-text-13"><a href="">AJUDA</a></li>
                        <li class="size-text-13"><a href="">MAPA DO SITE</a></li>
                        <li class="size-text-13"><a href="">PERGUNTAS FREQUENTES</a></li>

                    </ul>
                </div>
                <div class="another-service-box ">
                    <ul class="p-0">
                        <li class="size-text-13"><a href="">CONTACTO</a></li>
                        <li class="size-text-13"><a href="">FALE CONNOSCO</a></li>
                        <li class="size-text-13"><a href="">TRABALHE CONNOSCO</a></li>
                        <li class="d-flex flex-row   
                        ">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </footer>

    <div id="boxFullScreemImg" onclick="this.style.display='none';">
        <div class="full-action">
            <small id="closeFullScreemImg"> <i class="fas fa-times"></i>
            </small>
        </div>
        <div id="full">

        </div>

    </div>
    <script src="/assets/js/sweetalert2.all.min.js"></script>
    @if (session('feedback'))


        @if (isset(session('feedback')['status']))
            <script>
                Swal.fire(
                    '{{ session('feedback')['sms'] }}',
                    '',
                    'success'
                )
            </script>
        @endif
 
    @if (isset(session('feedback')['error']))
    <script>
        Swal.fire(
            '{{ session('feedback')['sms'] }}',
            '',
            'error'
        )
    </script>
@endif
@endif
    {{-- @dump(session('feedback')) --}}

    <script src="/assets/js/jquery-3.5.1.slim.min.js"></script>

    <script src="/assets/js/flickity.pkgd.js"></script>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/owl-carousel.js"></script>
    <script src="/assets/js/animation.js"></script>
    <script src="/assets/js/imagesloaded.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/full-screem-Img.js"></script>
    <script src="/assets/js/sweetalert2.all.min.js"></script>
    <script>
        $("#input-pesquisa").keyup(function() {
            var arte = $(this).val();

            var url = window.location.origin + '/pesquisas/artes/ajax/' + arte;
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: true,
                data: '',
                success: function(response) {
                    console.log(response);
                    $("#pesq-resultados").empty();
                    response.forEach(element => {
                        $("#pesq-resultados").append(

                            `
                         <a href='{{url('/pesquisas/artes/${arte}')}}'>
                         <div class='sc-text'>
                      
                         <h5 class='titulo-another-service text-dark '>
                            ${element.titulo}  
                         </h5>
                         <h6>
                            <span class='service-meta-info'> ${element.area}  </span>
                         </h6>
                         <span class='service-meta-info'> ${element.vc_primemiroNome} ${element.vc_apelido}</span>

                      
                          </div> </a> <hr>`);
                    });

                }
            });
        });
    </script>
