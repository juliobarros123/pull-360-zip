@extends('layouts._includes.site.app')
@section('titulo', ' Lista de classes')
@section('conteudo')
    <!-- Blog Section end -->


    <!--Modal capa-timeline start-->
    <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">///</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('timeline.capa-editar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="modal-body mx-3">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="titulo" placeholder="Título da arte">
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="capa" placeholder="Sua palavra passe">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="campo" placeholder="Preço" name="preco">
                            </div>
                            <div class="col-md-12">
                                <textarea name="descricao" id="" cols="50" class="campo" rows="20"> </textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-indigo">Editar <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Modal capa-timeline end-->

    <!--Modal cadastrar-imagem-galeria start-->
    <div class="modal fade" id="modal-form-galeria-cadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">///</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('timeline.fotos-galeria.cadastrar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" class="campo" placeholder="Preço" name="foto">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="campo" placeholder="Preço" name="preco">
                            </div>
                            <div class="col-md-12">
                                <textarea name="descricao" id="" cols="50" class="campo" rows="20"> </textarea>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button id="save-capa" class="btn btn-indigo">Cadastrar <i
                                class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Modal cadastrar-imagem-galeria end-->
    <!-- Gallery Section end -->
    <section class="gallery-section">
        <div class="gallery-header">
            <h4>Timeline</h4>
            @include('layouts._includes.site.timeline.nav')

        </div>
        <div class="nice-scroll">
            <div class="gallery-warp">
                <div class="grid-sizer"></div>

                <div class="gallery-item timeline w-100">
                    <!-- Gallery Section end -->
                    @php
                        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('Africa/Luanda');
                    @endphp

                    <section class="blog-details">
                        <div class="container">
                            <div class="single-blog-page">
                                <div class="blog-metas">
                                    <div class="blog-meta">
                                        POSTADO EM
                                        {{ strtoupper(strftime('%d de %B de %G', strtotime(date('d-m-Y', strtotime($capa_timeline->created_at))))) }}
                                    </div>
                                    <div class="blog-meta">{{ comentarios($capa_timeline->slug)->count() }} COMENTÁRIOS
                                    </div>
                                </div>

                                <h2>{{ $capa_timeline->titulo }}</h2>
                                <div class="blog-thumb">
                                    {{-- <div class="thumb-cata"><i class="fas fa-edit" data-toggle="modal"
                                            data-target="#modalSubscriptionForm"></i></div> --}}
                                    <img src="/storage/{{ $capa_timeline->capa }}" alt="">

                                </div>
                                <p>{{ $capa_timeline->descricao }}
                                </p>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                    anim id est laborum. </p>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                    architecto beatae vitae dicta sunt explicabo</p>
                                <div class="row blog-gallery">
                                    {{-- <div class="col-lg-3 p-0">
                                        <div class="bg-item">
                                            <img src="/timeline/img/blog-details/1.jpg" alt="">
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12 p-0">
                                        @php
                                            $col = 4;
                                        @endphp
                                        <div class="row m-0">
                                            @foreach ($fotos_galeria as $foto)
                                                @php
                                                    if ($loop->iteration == 1) {
                                                        $col = 4;
                                                    } elseif ($loop->iteration == 2) {
                                                        $col = 8;
                                                    } elseif ($loop->iteration == 3) {
                                                        $col = 8;
                                                    } elseif ($loop->iteration == 4) {
                                                        $col = 4;
                                                    }
                                                    
                                                @endphp

                                                <div class="col-lg-6 p-0 mt-2">
                                                    <div class="bg-item h-100">
                                                        <img src="/storage/{{ $foto->foto }}" class="w-100 h-100" alt="">
                                                    </div>
                                                </div>
                                            @endforeach

                                            {{-- <div class="col-lg-8 p-0">
                                                <div class="bg-item">
                                                    <img src="/timeline/img/blog-details/3.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-8 p-0">
                                                <div class="bg-item">
                                                    <img src="/timeline/img/blog-details/4.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 p-0">
                                                <div class="bg-item">
                                                    <img src="/timeline/img/blog-details/5.jpg" alt="">
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row pt-5">
                                    <div class="col-lg-6 mb-4">
                                        <a href="#" class="post-cata">people</a>
                                        <a href="#" class="post-cata">Photography</a>
                                        <a href="#" class="post-cata">nature</a>
                                    </div>
                                    <div class="col-lg-6 mb-5 text-left text-md-right">
                                        <div class="post-share">
                                            <span>Share:</span>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="blog-navigation">
                                    <div class="row m-0">
                                        <div class="col-lg-6 p-0">
                                            <a href="#" class="bn-item set-bg"
                                                data-setbg="/timeline/img/blog-details/blog-prev.jpg">
                                                <h4><i class="ti-arrow-left"></i> The Female Body Shape Men Find Most
                                                    Attractive</h4>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 p-0">
                                            <a href="#" class="bn-item bn-next set-bg"
                                                data-setbg="/timeline/img/blog-details/blog-next.jpg">
                                                <h4><i class="ti-arrow-right"></i>Vietnam's largest art community</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="recent-blog">
                                    <h3 class="mb-4 pb-2">Recommended For You</h3>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="blog-item rp-item set-bg" data-setbg="/timeline/img/blog/6.jpg">
                                                <div class="bi-tag">nature</div>
                                                <div class="bi-text">
                                                    <div class="bi-date">May 19, 2019 | 3 Comment</div>
                                                    <h3><a href="blog-details.html">The Biggest Cinema Event In 2019</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="blog-item rp-item set-bg" data-setbg="/timeline/img/blog/4.jpg">
                                                <div class="bi-tag">nature</div>
                                                <div class="bi-text">
                                                    <div class="bi-date">May 19, 2019 | 3 Comment</div>
                                                    <h3><a href="blog-details.html">The Biggest Cinema Event In 2019</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="blog-item rp-item set-bg" data-setbg="/timeline/img/blog/3.jpg">
                                                <div class="bi-tag">nature</div>
                                                <div class="bi-text">
                                                    <div class="bi-date">May 19, 2019 | 3 Comment</div>
                                                    <h3><a href="blog-details.html">The Biggest Cinema Event In 2019</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                    <!-- Blog Section end -->
                </div>




            </div>
        </div>
    </section>


@endsection
