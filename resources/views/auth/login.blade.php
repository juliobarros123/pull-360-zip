


@extends('layouts._includes.site.app')
@section('titulo', ' Iniciar sessão')
@section('conteudo')
    <!-- Blog Section end -->




    <!-- Gallery Section end -->
    {{-- <section class="gallery-section">

        <div class="nice-scroll">
            <div class="gallery-warp">
                <div class="grid-sizer"></div>
                <div class="gallery-item timeline w-100">
                    <!-- Gallery Section end -->
                    <section class="blog-details">
                        <div class="container">
                            <div class="single-blog-page">

                                <h2>Olá! vamos começar</h2>


                                <div class="comment-form">
                                    <h3> Faça login para continuar.</h3>
                                    <form action="{{ url('login') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Seu nome de utilizador ou e-mail"
                                                    name="vc_email">
                                            </div>



                                            <div class="col-md-4">
                                                <input type="password" name="password" placeholder="Sua palavra passe">
                                            </div>


                                            <div class="col-md-12">

                                                <button type="submit">Iniciar sessão</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                      <div class="text-center mt-4 font-weight-light">
                                        <a href="{{ url('palavra_passe/recuperar') }}" class="auth-link text-black ">Esqueceu a senha?</a>
                                    </div>
                                      <div class="text-center mt-4 font-weight-light">
                                        Não tem uma conta? <a href="{{url('inscrever-se')}}" class="text-primary">Criar</a>
                                    </div>
                      
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Blog Section end -->
                </div>



            </div>
        </div>
    </section> --}}

    <section class="_another-service   vh-100 d-flex  items-align-center  justify-content-center    ">

        <div class="service   ">
            <div class="box-72  ">
                <h3> Faça login para continuar.</h3>
                <form action="{{ url('login') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" placeholder="Seu nome de utilizador ou e-mail"
                                name="vc_email"  class="border-form w-100 btn-1">
                        </div>



                        <div class="col-md-12 form-group">
                            <input type="password"  class="border-form w-100 btn-1" name="password" placeholder="Sua palavra passe">
                        </div>


                        <div class="col-md-12">

                            <button type="submit" class="btn-format text-white rounded    btn-blue p-2 border-0">Iniciar sessão</button>
                        </div>
                    </div>
                </form>

                <div class="text-center mt-4 font-weight-light">
                    <a href="{{ url('palavra_passe/recuperar') }}" class="auth-link text-black ">Esqueceu a senha?</a>
                </div>
                  <div class="text-center mt-4 font-weight-light">
                    Não tem uma conta? <a href="{{url('inscrever-se')}}" class="text-primary">Criar</a>
                </div>
                {{-- <form action="{{ route('timeline.fotos-galeria.cadastrar') }}" method="POST"
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

                </div> --}}
            </form>
            </div>
        </div>
    </section>
@endsection
