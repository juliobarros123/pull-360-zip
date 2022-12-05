@auth


    <section class="artes gallery  d-flex flex-row flex-wrap justify-content-center   ">

        <div class="  box-72   mt-4  ">
            <ul class="p-0 d-flex flex-row-reverse w-100 ">

                <li class="font-13"> <a href="{{ route('logout') }}" id="sessao"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-uppercase text-danger">TERMINAR SESSÃO <i class="fas fa-sign-out-alt"></i></a> </li>

            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
            <ul class="p-0 d-flex flex-row-reverse w-100 ">


                <li class="font-13"> / <a href=""
                        class="text-dark text-uppercase">{{ Auth::User()->vc_primemiroNome . ' ' . Auth::User()->vc_apelido }}</a>
                </li>
                <li class="font-13"> <a href="{{ route('timeline.fotos-galeria', ['slug' => Auth::User()->slug]) }}"
                        class="_text-color-3"> / GALERIA</a></li>
                <li class="font-13"> <a href="{{ route('painel') }}" class="_text-color-3"> PAINEL </a></li>
            </ul>
            <div class="d-flex justify-content-end">
                <i class="fas fa-plus-circle" data-toggle="modal" data-target=".bd-example-modal-lg"></i>
            </div>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">NOVA IMAGEM</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">



                            <form action="{{ route('timeline.fotos-galeria.cadastrar') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class=" bg-another p-2 ">
                                            <p class=" mb-0">INFORMAÇÃO DA IMGEM</p>
                                            <div class="row pb-3 mt-0">
                                                <div class="form-group col-md-6">
                                                    <label class="font-14" for="">IMAGEM</label>
                                                    <br>
                                                    <input type="file" name="foto" required
                                                        class="border-form w-100 btn-1 ">
                                                </div>

                                                <div class="form-group  col-md-6 ">
                                                    <label class="font-14" for="">TÍTULO</label>
                                                    <br>
                                                    <input type="text" name="titulo" required
                                                        class="border-form w-100 btn-1 ">
                                                </div>

                                                <div class="form-group  col-md-6 ">
                                                    <label class="font-14" for="">ÁREA</label>
                                                    <br>
                                                    <select class="border-form w-100 btn-1" name="id_area" id="id_area" required>
                                                        <option selected  disabled>Selecciona a área </option>
                                                        </option>
                                                        @foreach ($areas as $item)
                                                        <option value="{{ $item->id }}">{{ $item->area }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                             
                                        
                                                <div class="form-group  col-md-6 ">
                                                    <label class="font-14" for="">PREÇO</label>
                                                    <br>
                                                    <input type="number" name="preco" class="border-form w-100 btn-1 ">
                                                </div>

                                                <div class="d-flex justify-content-center col-md-12 ">
                                                    <button href=""
                                                        class=" btn-format text-white rounded    btn-blue p-2 border-0">
                                                        ADICIONAR
                                                    </button>
                                                </div>

                                            </div>
                                        </div>




                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <hr>





        </div>



    </section>
@endauth
