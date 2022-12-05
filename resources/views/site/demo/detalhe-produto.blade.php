@extends('layouts._includes.site.app')

{{-- @section('titulo', ' Lista de classes') --}}

@section('conteudo')
    <section class="artes gallery  d-flex flex-row flex-wrap    mt--65">
        <div class="product box-65 mt-4 box-produt-img ">
            <div class="w-100 h-100">
                <img src="/assets/images/DJI_0017-Editar-Editar.jpg" alt="">
            </div>

        </div>
        <div class="product  box-35  detalhes mt-4 ">
            <ul class="p-0 d-flex flex-row w-100 ">
                <li class="font-13 "><a href="" class="text-dark"> FOTOGRAFIA </a> </li>
                <li class="font-13"> / <a href="" class="text-dark">IVANCEFÉLOPES</a> </li>
                <li class="font-13"> / <a href="" class="_text-color-3">MARAVILHAS NATURAIS</a></li>
            </ul>


            <p class=" second-title mt-2--5 ">QUEDAS DE KALANDULA</p>
            <p class=" second-title font-weight-400  ">AOA 2.560,00</p>
            <ul class="p-0 d-flex flex-column mt-4 box-82">
                <li class="font-13 "> TAMANHO MÁXIMO 7360 x 4012 PDELS(6231C X 4L50 CMJ-300 DPI-RGD) </li>
                <li class="font-13 "> ID DA FOTOGRAFIA 124KJFK4 </li>
                <li class="font-13 "> ID DA FOTOGRAFIA 124KJFK4 </li>
                <li class="font-13 "> ID DA FOTOGRAFIA 124KJFK4 </li>


            </ul>
            <hr>
            <p class=" mt-4 font-20">FORMATOS</p>

            <div class="service bg-white">
                <div class="w-100 d-flex flex-wrap flex-row fomarts ">
                    <a href="" class="bg-1 btn-format border-form rounded font-14
                          "> JPG
                    </a>

                    <a href="" class=" btn-format border-form rounded font-14   "> PNG
                    </a>

                    <a href="" class=" btn-format border-form rounded  font-14 "> BMP
                    </a>

                    <a href="" class=" btn-format border-form rounded  font-14 "> PDF
                    </a>
                    <a href="" class=" btn-format border-form rounded  font-14 "> ZIP
                    </a>


                </div>
            </div>
            <p class=" mt-4 font-20">TAMANHO</p>

            <div class="service bg-white">
                <div class="w-100 d-flex flex-wrap flex-row fomarts ">
                    <a href="" class="bg-1 btn-format border-form rounded font-14
                          ">
                        ORIGINAL
                    </a>

                    <a href="" class=" btn-format  rounded   font-14 "> 6000x4000
                    </a>
                </div>
                <div class="w-100 d-flex flex-wrap flex-row fomarts mt-2 ">
                    <a href="" class=" btn-format border-form rounded font-14
                      "> ORIGINAL
                    </a>

                    <a href="" class=" btn-format  rounded font-14   "> 1920x1280
                    </a>
                </div>
                <div class="w-100 d-flex flex-wrap flex-row fomarts mt-2 ">
                    <a href="" class=" btn-format border-form rounded font-14
                  "> ORIGINAL
                    </a>

                    <a href="" class=" btn-format  rounded font-14    "> 1280x853
                    </a>
                </div>
                <div class="w-100 d-flex flex-wrap flex-row fomarts mt-2 ">
                    <a href="" class=" btn-format border-form rounded font-14
                  "> ORIGINAL
                    </a>

                    <a href="" class=" btn-format  rounded    font-14 "> 640x427
                    </a>
                </div>
            </div>

            <div class=" mt-4">
                <a class="_button-service text-center text-white bg-primary  _roundend-pill border-0 font-18  ">ADICIONAR AO
                    CARRINHO</a>
            </div>
            <div class="service bg-white mt-2 mb-4">
                <div class="w-100 d-flex flex-wrap flex-row fomarts ">
                    <a href="" class="  btn-format rounded font-14 text-dark
                          "> SALVAR
                    </a>

                    <a href="" class=" btn-format  rounded   font-14 text-dark "> PARTILHAR
                    </a>
                </div>


            </div>





        </div>


        <div class="  box-35  detalhes box-product-order">
            <div class="service bg-white p-3">
                <div class="w-100 d-flex flex-wrap flex-row fomarts justify-content-center ">
                    <select name="" class=" btn-format border-form rounded font-14 p-1" id="">
                        <option selected disabled>ORDERNAR POR DATA</option>
                        <option>02-05-2022</option>
                    </select>
                    <!-- <a href="" class="
                          ">
                            </a> -->
                </div>
            </div>


        </div>
    </section>








{{-- 
    <section class="artes gallery  d-flex flex-row flex-wrap  ">
        <div class="arte box-70 ">
            <div class="w-100 h-100">
                <img src="/assets/images/DJI_0017-Editar-Editar.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>
        <div class="arte  box-30">
            <div class="w-100 h-100">
                <img src="/assets/images/test.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>
        <div class="arte box-30 ">
            <div class="w-100 h-100">
                <img src="/assets/images/AD1A3645.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>
        <div class="arte  box-70">
            <div class="w-100 h-100">
                <img src="/assets/images/DJI_0017-Editar-Editar.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>
        <div class="arte box-70 ">
            <div class="w-100 h-100">
                <img src="/assets/images/DJI_0017-Editar-Editar.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>
        <div class="arte  box-30">
            <div class="w-100 h-100">
                <img src="/assets/images/test.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>

    </section> --}}


    <section class="artes gallery  d-flex flex-row flex-wrap  ">
        @foreach ($fotos_galeria as $item)
       
    {{-- @dump($item) --}}
        <div class="arte col-md-6 ">
            <div class="w-100 h-100">
                <img src="/storage/{{ $item->foto }}" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>

        @endforeach
        {{-- <div class="arte  box-30">
            <div class="w-100 h-100">
                <img src="/assets/images/test.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>
        <div class="arte box-30 ">
            <div class="w-100 h-100">
                <img src="/assets/images/AD1A3645.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>
        <div class="arte  box-70">
            <div class="w-100 h-100">
                <img src="/assets/images/DJI_0017-Editar-Editar.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>
        <div class="arte box-70 ">
            <div class="w-100 h-100">
                <img src="/assets/images/DJI_0017-Editar-Editar.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>
        <div class="arte  box-30">
            <div class="w-100 h-100">
                <img src="/assets/images/test.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div> --}}

    </section>

    <section class="artes gallery  js-flickity" data-flickity-options='{ "wrapAround": true }'>
        <div class="arte  ">
            <div class="w-100 h-100">
                <img src="/assets/images/AD1A3645.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>

        <div class="arte  ">
            <div class="w-100 h-100">
                <img src="/assets/images/test.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>


        <div class="arte  ">
            <div class="w-100 h-100">
                <img src="/assets/images/test2.jpg" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>

        <div class="arte  ">
            <div class="w-100 h-100">
                <img src="/assets/images/Ilha_de_Luanda_╕_Ivan_Lopes.png" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>

        <div class="arte  ">
            <div class="w-100 h-100">
                <img src="/assets/images/Edifícios_╕_Ivan_Lopes.png" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>

        <div class="arte  ">
            <div class="w-100 h-100">
                <img src="/assets/images/Baixa_de_Luanda_╕_Ivan_Lopes.png" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>
        <div class="arte  ">
            <div class="w-100 h-100">
                <img src="/assets/images/Tundavala_╕_Ivan_Lopes.png" alt="">
            </div>
            <div class="info-arte">
                <p class="text-white">FOTOGRAFIA</p>
                <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                <a class=" know-more-banner ">Imagens em HD</a>
                <div class="acoes-info-artes mt-2">

                    <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                        EXPLORE
                    </a>

                    <a class=" know-more-info   ">Saber mais></a>
                </div>
            </div>
        </div>



    </section>

    {{-- <section class="_another-service  mb-4  ">
        <div class="service mt-3   ">
            <div class="box-82 d-flex flex-wrap flex-row justify-content-center mt-4">
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> FOTOGRAFIA
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> MÚSICA
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> MODA
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> ARTE
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> COMUNIDADE
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> ESCULTURA
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> ARQUITETURA
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> DESIGN
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> DESIGN GRÁFICO
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> PUBLICIDADE
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> TRANSCRIÇÕES
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> PINTURA
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> INGRESSOS
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> LIVROS
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> TRADUÇÃO
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> WEB DESIGN
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> COPYRIGHTING
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> EVENTOS
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> DJ
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> PROGRAMAÇÃO
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> MEMES
                    </a>
                </div>
                <div class="service-box ">
                    <a href="" class="  _button-service bg-white _roundend-pill   "> DESIGN UI & XI
                    </a>
                </div>
            </div>
        </div>


        <script>
            document.onmousedown = disableclick;

            function disableclick(event) {
                if (event.button == 2) {
                    return false;
                }
            }
        </script>



    </section> --}}
    <!-- Scripts --
@endsection
