@extends('layouts._includes.site.app')

{{-- @section('titulo', ' Lista de classes') --}}

@section('conteudo')
   

<section class="_another-service bg-white mt--65 ">
    <div class="service ">
        <div class="box-72  ">
            <p class=" second-title ">GALERIA</p>
         
        </div>
    </div>


</section>
@include('layouts._includes.site.menu-painel.menu')
{{-- @dump($fotos_galeria) --}}
    <section class="artes gallery  d-flex flex-row flex-wrap  ">
        @foreach ($fotos_galeria as $item)
            {{-- @dump($item) --}}
            <div class="arte col-md-6 ">
                <div class="w-100 h-100">
                    <img src="{{asset("/storage/$item->foto")}}" alt="">
                </div>
                <div class="info-arte">
                    <p class="text-white">{{$item->area}}</p>
                    <p class="info-arte-sub-title mb-2">Nosso Banco de Imagens</p>
                    <a class=" know-more-banner ">Imagens em HD</a>
                    <div class="acoes-info-artes mt-2">

                        <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                            EXPLORE
                        </a>

                        <a class=" know-more-info   " href="{{route('timeline.fotos-galeria.detalhe_produto',['slug'=> $item->slug_foto])}}">Saber mais></a>
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

    @include('layouts._includes.site.fragments.js_flickity_images')
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
