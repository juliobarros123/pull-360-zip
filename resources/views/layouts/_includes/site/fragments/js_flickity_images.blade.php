<section class="artes js-flickity gallery mb-1-5" data-flickity-options='{ "wrapAround": true }'>

    @foreach (js_flickity_images()->get() as $item)

    <div class="arte  ">
        <div class="w-100 h-100">
            <img src="{{asset("/storage/$item->foto")}}" alt="">
        </div>
        <div class="info-arte">
            <p class="text-white">{{$item->area}}</p>
            <p class="info-arte-sub-title mb-2">{{$item->titulo}}</p>
            <a class=" know-more-banner "> {{$item->vc_primemiroNome . ' ' . $item->vc_apelido }}</a>
            <div class="acoes-info-artes mt-2">

                <a href="" class=" mt-2 _size-btn-1  _bg-primary _roundend-pill _text-btn _text-btn-size-1">
                    EXPLORE
                </a>

                <a class=" know-more-info" href="{{route('timeline.fotos-galeria.detalhe_produto',['slug'=> $item->slug_foto])}}">Saber mais></a>
            </div>
        </div>
    </div>
    @endforeach
  

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