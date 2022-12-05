@extends('layouts._includes.site.app')

{{-- @section('titulo', ' Lista de classes') --}}

@section('conteudo')
    <section class="_another-service bg-white  ">
        <div class="service ">
            <div class="box-72  mt-p-6">

                <p class=" second-title ">INFORMAÇÃO DE FECHO</p>
                <p class=" mt-3">ITENS SELECIONADO PARA COMPRA: <small> <strong>{{session()->has("produtos")?count(session()->get('produtos')):0}}</strong> </small></p>

            </div>
        </div>


    </section>

    <section class="_another-service bg-white mb-3     ">

        <div class="service">
            <div class="box-72  ">
                <p class="font-14 mb-1 text-right  w-49 font-14 ">COMPRA SEGURA</p>
                <form action="{{route('compras.efectuar-compra')}}" method="POST">
                 @csrf
                    <div class="row ">
                        <div class="col-md-6 ">
                            <div class=" bg-another p-2 ">
                                <p class=" mb-0">INFORMAÇÃO DE CONTACTO</p>
                                <div class="row pb-3 mt-0">
                                    <div class="form-group col-md-6">
                                        <label class="font-14" for="">E-MAIL</label>
                                        <br>
                                        <input type="email" class="border-form w-100 btn-1 " name="email">
                                    </div>
                                    <div class="form-group  col-md-6 ">
                                        <label class="font-14" for="">Nº TELEFONE</label>
                                        <br>
                                        <input type="number" class="border-form w-100 btn-1 " name="telefone">
                                    </div>
                                    <div class="form-group  col-md-6 ">
                                        <label class="font-14" for="">SENHA</label>
                                        <br>
                                        <input type="password" class="border-form w-100 btn-1 " name="password">
                                    </div>
                                    <div class="form-group  col-md-6 ">
                                        <label class="font-14" for="">CONFIRMAR</label>
                                        <br>
                                        <input type="password" class="border-form w-100 btn-1 " name="confirm_password">
                                    </div>
                                </div>
                            </div>

                            <div class="  bg-another mt-4  p-2 ">
                                <p class=" mb-0">INFORMAÇÃO DE FACTURAÇÃO</p>
                                <div class="row pb-3 mt-0">
                                    <div class="form-group col-md-12">
                                        <label class="font-14" for="">PAÍS/REGIÂO</label>
                                        <br>
                                        <select name="" id="" class="border-form w-100 btn-1 "
                                            name="pais">
                                            <option value="">Angola</option>
                                        </select>

                                    </div>
                                    <div class="form-group  col-md-6 ">
                                        <label class="font-14" for="">NOME</label>
                                        <br>
                                        <input type="text" class="border-form w-100 btn-1 " name="nome">
                                    </div>
                                    <div class="form-group  col-md-6 ">
                                        <label class="font-14" for="">SOBRENOME</label>
                                        <br>
                                        <input type="text" class="border-form w-100 btn-1 " name="sobre_nome">
                                    </div>
                                    <div class="form-group  col-md-12">
                                        <label class="font-14" for="">EMPRESA OU ORGANIZAÇÃO</label>
                                        <br>
                                        <input type="text" class="border-form w-100 btn-1 " name="empresa">
                                    </div>
                                    <div class="form-group  col-md-6 ">
                                        <label class="font-14" for="">ENDEREÇO</label>
                                        <br>
                                        <input type="text" class="border-form w-100 btn-1 " name="endereco">
                                    </div>
                                    <div class="form-group  col-md-6 ">
                                        <label class="font-14" for="">CÓDIGO POSTAL</label>
                                        <br>
                                        <input type="text" class="border-form w-100 btn-1 " name="codigo_postal">
                                    </div>
                                    <div class="form-group  col-md-6 ">
                                        <label class="font-14" for="">Nº TELEFONE</label>
                                        <br>
                                        <input type="number" class="border-form w-100 btn-1 " name="tefefone_faturacao">
                                    </div>
                                </div>
                            </div>

                            <div class="  bg-another mt-4  p-2 ">
                                <p class=" mb-0">INFORMAÇÕES SOBRE PAGAMENTO</p>
                                <div class="row pb-3 mt-0">
                                    <div class="form-group col-md-6">
                                        <input type="radio" class="border-form h-px-10 " name="cartao_credito">
                                        <label class="font-14 " for="">CARTÃO DE CRÉDITO</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="radio" class="border-form h-px-10 " name="multicaixa_experss">
                                        <label class="font-14 " for="">MULTICAIXA EXPRESS</label>
                                    </div>
                                    <div class="form-group  col-md-6 ">
                                        <label class="font-14" for="">NUMERO DO CARTÃO</label>
                                        <br>
                                        <input type="text" class="border-form w-100 btn-1 " name="numero_cartao">
                                    </div>

                                    <div class="form-group  col-md-6">

                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label class="font-14" for="">VALIDADE DO CARTÃO</label>
                                        <br>
                                        <input type="text" class="border-form w-100 btn-1 " name="validade_cartao">
                                    </div>
                                    <div class="form-group  col-md-6 ">
                                        <label class="font-14" for="">CÓDIGO DE VERIFICAÇÃO</label>
                                        <br>
                                        <input type="text" class="border-form w-100 btn-1 " name="codigo_verificacao">
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <input type="checkbox" class="border-form h-px-10 " name="guardar_cartao">
                                        <label class="font-14 " for="">GUARDAR ESTE CARTÃO NA MINHA CONTA</label>
                                    </div>

                                </div>
                            </div>
                            <!-- <h1 class="text-center mt-5"></h1> -->
                            <p class="text-center mt-5 font-44 w-100 ">TOTAL AOA 2.560,00</p>

                            <div class="d-flex justify-content-center mt-4 bg-white">
                                <button type="submit"
                                    class=" btn-format text-white rounded border-0    btn-blue p-1 w-100 p-2 font-25 "> CONCORDO -
                                    PAGAR AGORA
                                </button>
                            </div>
                        </div>
                        <div class="col-md-5 ml-px-16 pm-12 ">

                            <div class=" ">

                                <div class="row pb-3 ">
                                    <p class="bg-another p-2-p-5 w-100 font-21 text-black">DETALHES DA COMPRA</p>
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
                                    <select name=""
                                        class=" font-21 tex btn-format border-form rounded w-100 border-0 text-black"
                                        id="">
                                        <option selected disabled>MOSTRAR TODOS OS DETALHES DA COMPRA</option>
                                        <option>02-05-2022</option>
                                    </select>
                                    <!-- <p class="font-21 mb-1  "></p> -->
                                    <hr class="mb-2 w-100">
                                    <h4 class=" text-right mt-0 w-100">TOTAL AOA {{ $produtos->sum('price')}},00</h4>

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
