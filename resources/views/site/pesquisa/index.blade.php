@extends('layouts._includes.site.app')

{{-- @section('titulo', ' Lista de classes') --}}

@section('conteudo')
    <section class="_another-service bg-white mt--65 ">
        <div class="service ">
            <div class="box-72  ">
                <p class=" second-title ">CERCA DE <span class="_text-color-3">{{$fotos_galeria->count()}}</span>  RESULTADO DA PESQUISA</p>

            </div>
        </div>


    </section>

    @include('layouts._includes.site.menu-painel.menu')

    <section class="artes gallery  d-flex flex-row flex-wrap mb-5  ">
        @foreach ($fotos_galeria as $item)
            {{-- @dump($item) --}}
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
     

    </section>
    <!-- Scripts --
@endsection
