@extends('layouts._includes.site.app')

{{-- @section('titulo', ' Lista de classes') --}}

@section('conteudo')
    <section class="artes gallery  d-flex flex-row flex-wrap    mt--65">
        <div class="product box-65 mt-4 box-produt-img ">
            <div class="w-100 h-100">
                {{-- @dump() --}}
                <img src="{{asset("/storage/$fotos_galeria->foto")}}" alt="">
            </div>

        </div>
        <div class="product  box-35  detalhes mt-4 ">
            <ul class="p-0 d-flex flex-row w-100">
                <li class="font-13 "><a href="" class="text-dark">  {{$fotos_galeria->area}} </a> </li>
                <li class="font-13"> / <a href="" class="text-dark text-uppercase">{{$fotos_galeria->vc_primemiroNome . ' ' . $fotos_galeria->vc_apelido }}</a> </li>
                <li class="font-13"> / <a href="" class="_text-color-3 text-uppercase">{{$fotos_galeria->titulo}}</a></li>
            </ul>


            <p class=" second-title mt-2--5 ">{{$fotos_galeria->titulo}}</p>
            <p class=" second-title font-weight-400  ">AOA 2.560,00</p>
            <ul class="p-0 d-flex flex-column mt-4 box-82">
                <li class="font-13 "> TAMANHO MÁXIMO {{$fotos_galeria->largura}} x {{$fotos_galeria->altura}} PDELS(6231C X 4L50 CMJ-300 DPI-RGD) </li>
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

                    <a href="" class=" btn-format  rounded   font-14 "> {{$fotos_galeria->largura}}x{{$fotos_galeria->altura}}
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
                <a class="_button-service text-center text-white bg-primary  _roundend-pill border-0 font-18"
                 href="{{route('carrinhos.add',['slug_foto'=>$fotos_galeria->slug_foto])}}">ADICIONAR AO
                    CARRINHO</a>
            </div>
            <div class="service bg-white mt-2 mb-4">
                <div class="w-100 d-flex flex-wrap flex-row fomarts ">
                    <a href="{{asset("/storage/$fotos_galeria->foto")}}" download class="  btn-format rounded font-14 text-dark
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






@include('layouts._includes.site.fragments.js_flickity_images')
@endsection
