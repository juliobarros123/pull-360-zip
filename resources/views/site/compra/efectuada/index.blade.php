@extends('layouts._includes.site.app')

{{-- @section('titulo', ' Lista de classes') --}}

@section('conteudo')
<section class="_another-service bg-white  mt-p-4 pt-5 mb-4      ">

    <div class="service ">
        <div class="box-72   ">
     
            <form action="">
                <div class="row ">
                    <div class="col-md-6 ">
                        <div class=" bg-another p-2 rounded ">
                            <p class="font-20 mb-0">Obrigado Sr. {{Auth::User()->vc_primemiroNome.' '.Auth::User()->vc_apelido}}!</p>
                            <p class="font-20 mb-0">Seu pedido está confirmado</p>
                            <p class=" font-20 mb-0  ">Você receberá um e-mail de confirmação com o número do seu
                                pedido em breve.</p>
                            <div class="d-flex  mt-4 pb-5">
                                <a href="" class=" btn-format text-white rounded    btn-blue p-1  w-45  font-16 ">
                                    BAIXAR AGORA
                                </a>
                            </div>
                            <p class="font-20  ">Você também receberá um e-mail com os links para download da
                                sua compra.</p>
                        </div>

                        <div class=" bg-another p-2 rounded mt-4 ">
                            <p class="font-20">DADOS DO CLIENTE</p>
                            <p class="font-20 mb-0">informação de contacto</p>
                            <div class="d-flex flex-row">
                                <p class="font-20 mb-0">joaofx@gmail.com</p>
                                <div class="font-16 mb-0  d-flex flex-column pl-5">
                                    <p class="font-20 mb-0">João Felix</p>
                                    <p class="font-20 mb-0">Luanda</p>
                                    <p class="font-20 mb-0">Luanda</p>
                                </div>
                            </div>




                        </div>

                       
                       
                    </div>
                    <div class="col-md-5 ml-px-16 ">

                        <div class="pr-2">

                            <div class="row pb-3 ">
                                <p class="font-21  bg-another p-2-p-5 w-100">DETALHES DA COMPRA</p>
                                @foreach ($produtos as $item)
                                <div class=" row ">
                                  
                                        <div class="col-md-12 d-flex flex-row mb-1 ">
                                            <div class="">
                                                <img src="{{asset("/storage/{$item['path_img']}")}}"
                                                    class="img-table-item" alt="">
                                            </div>
                                            <div class="ml-2">
                                                <div class="d-flex flex-column">
                                                    <small class="font-14">{{$item['name']}}</small>
                                                    <small class="font-14">TAMANHO MÁXIMO:{{$item['largura']}} X {{$item['altura']}} PIXELS</small>
                                                    <small class="font-14">{{$item['name']}}</small>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <p class="font-21 w-100   text-right  mb-0">AOA {{$item['price']}},00</p>
                                
                                <hr class=" w-100">
                                @endforeach
                              
                               
                                
                                <div class="d-flex justify-content-end mt-5 bg-white  pm p-0  w-100">
                                <a href="" class="btn-format bg-menu-1  p-2 font-16 pl-5 pr-5  rounded  border-form mt-1 text-black text-center border-another-service ">
                                    VOLTAR PARA A LOJA
                                </a>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


    {{-- 

@include('layouts._includes.site.fragments.js_flickity_images') --}}
@endsection
