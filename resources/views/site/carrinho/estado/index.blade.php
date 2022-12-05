@extends('layouts._includes.site.app')

{{-- @section('titulo', ' Lista de classes') --}}

@section('conteudo')
<section class="_another-service bg-white h-100 mt--65   ">
    <div class="service ">
        <div class="box-72   mt-2  ">

            <h6 class="title-detalhes mt-4">CARRINHO DE COMPRAS</h6>
            <p class=" mt-3">ITENS SELECIONADO PARA COMPRA: <small> <strong>{{session()->has("produtos")?count(session()->get('produtos')):0}}</strong> </small></p>
        </div>
    </div>
    <div class="service ">
        <div class="box-72  mt-2  ">

            <div class="table-responsive">
                <table class="table mt-4">
                    <thead class="">
                        <tr>
                            <th scope="col">ITEM</th>
                            <th scope="col">DESCRIÇÃO</th>
                            <th scope="col" class="text-center">QTD</th>
                            <th scope="col" class="text-center">UNITÁRIO</th>
                            <th scope="col" class="text-right">VALOR</th>
                            <th scope="col" class="text-right">ACÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $item)
                            
                    {{-- @dump($item) --}}
                         <tr style="">
                            <td><img src="{{asset("/storage/{$item['path_img']}")}}" class="img-table-item" alt="">
                            </td>
                            <td>{{$item['name']}}</td>
                            <td class="text-center"> {{$item['quantity']}}</td>
                            <td class="text-center">{{$item['price']}} akz</td>
                            <td class="text-right">{{$item['quantity']*$item['price']}} akz</td>
                            <td class="text-right"> 
                                <a href="{{route('carrinhos.eliminar',['id'=>$item['id']])}}" class="btn-format  rounded font-16 text-white bo _bg-btn-1  border-none p-2 "> ELIMINAR
                                </a>
                                {{-- <a href="" class="  btn-format border-form rounded font-14   ">
                                    ELIMINAR
                                </a> --}}
                       
                </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-total ">
                <h5 class="text-right  pr-2">{{ $produtos->sum('price')}} akz</h5>
            </div>
            <div class="box-total d-flex justify-content-end p-0 ">
                <hr class="w-22">
            </div>
        </div>
    </div>

    <div class="service ">
        <div class="box-72  mt-2  d-flex justify-content-end ">

            <div class="w-20  d-flex flex-column">
                <a href="{{route('compras.comprar')}}" class=" btn-format text-white rounded    btn-blue p-1"> PROSSEGUIR COM A COMPRA
                </a>
                <a href="{{url('/')}}" class=" btn-format bg-color-1  rounded  border-form mt-1 text-black text-center">
                    CONTINUAR NA LOJA
                </a>
            </div>

        </div>
    </div>








</section>


@include('layouts._includes.site.fragments.js_flickity_images')
@endsection
