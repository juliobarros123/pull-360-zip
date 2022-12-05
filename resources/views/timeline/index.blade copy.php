@extends('layouts._includes.site.app')
@section('titulo', ' Lista de classes')
@section('conteudo')
    <!-- Blog Section end -->



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
                        <div class="col-md-4">
                            <input type="file" name="capa" placeholder="Sua palavra passe">
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-indigo">Editar <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Gallery Section end -->
    <section class="gallery-section">
        <div class="gallery-header">
            <h4>Gallery</h4>
            <ul class="gallery-filter">
                {{-- <li class="filter all active" data-filter="*">All</li> --}}
                <li class="filter active" data-filter=".timeline">Timeline</li>
                <li class="filter" data-filter=".galeria">Galeria</li>

                <li class="filter" data-filter=".sobre">Sobre</li>
                <li class="filter" data-filter=".animal">Sobre</li>
                <li class="filter" data-filter=".travel">Travel</li>
            </ul>
        </div>
        <div class="nice-scroll">
            <div class="gallery-warp">
                <div class="grid-sizer"></div>

                <div class="gallery-item timeline w-100">
                    <!-- Gallery Section end -->


                    <section class="blog-details">
                        <div class="container">
                            <div class="single-blog-page">
                                <div class="blog-metas">
                                    <div class="blog-meta">May 19, 2019</div>
                                    <div class="blog-meta">3 Comment</div>
                                </div>

                                <h2>The Female Body Shape Men Find</h2>
                                <div class="blog-thumb">
                                    <div class="thumb-cata"><i class="fas fa-edit" data-toggle="modal"
                                            data-target="#modalSubscriptionForm"></i></div>
                                    <img src="/storage/{{$capa_timeline->capa}}" alt="">
                                
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                    anim id est laborum. </p>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                    architecto beatae vitae dicta sunt explicabo</p>
                                <div class="row blog-gallery">
                                    <div class="col-lg-3 p-0">
                                        <div class="bg-item">
                                            <img src="/timeline/img/blog-details/1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-9 p-0">
                                        <div class="row m-0">
                                            <div class="col-lg-4 p-0">
                                                <div class="bg-item">
                                                    <img src="/timeline/img/blog-details/2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-8 p-0">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-5">
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
                                </div>
                                <div class="blog-navigation">
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
                                </div>
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
                                <div class="comment-option">
                                    <h3>2 Comments</h3>
                                    <div class="single-comment-item first-comment">
                                        <div class="sc-author">
                                            <img src="/timeline/img/blog-details/user-1.jpg" alt="">
                                        </div>
                                        <div class="sc-text">
                                            <span>27 Aug 2019</span>
                                            <h5>Brandon Kelley</h5>
                                            <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur, adipisci velit, sed quia non numquam eius modi tempora.lit, sed
                                                quia non numquam eius modi tempora numquam eius modi tempora..</p>
                                            <a href="#" class="comment-btn like-btn">Like</a>
                                            <a href="#" class="comment-btn">Reply</a>
                                        </div>
                                    </div>
                                    <div class="single-comment-item reply-comment">
                                        <div class="sc-author">
                                            <img src="/timeline/img/blog-details/user-2.jpg" alt="">
                                        </div>
                                        <div class="sc-text">
                                            <span>27 Aug 2019</span>
                                            <h5>Mia Maya</h5>
                                            <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur, adipisci velit, sed quia non numquam eius modi tempora.lit, sed
                                                quia non numquam eius modi tempora numquam eius modi tempora.</p>
                                            <a href="#" class="comment-btn like-btn">Like</a>
                                            <a href="#" class="comment-btn">Reply</a>
                                        </div>
                                    </div>
                                    <div class="single-comment-item second-comment ">
                                        <div class="sc-author">
                                            <img src="/timeline/img/blog-details/user-3.jpg" alt="">
                                        </div>
                                        <div class="sc-text">
                                            <span>27 Aug 2019</span>
                                            <h5>Mike Phillips</h5>
                                            <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur, adipisci velit, sed quia non numquam eius modi tempora.lit, sed
                                                quia non numquam eius modi tempora numquam eius modi tempora.</p>
                                            <a href="#" class="comment-btn like-btn">Like</a>
                                            <a href="#" class="comment-btn">Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-form">
                                    <h3>Leave A Comment</h3>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Name">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Email">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Phone">
                                            </div>
                                            <div class="col-md-12">
                                                <textarea placeholder="Comment"></textarea>
                                                <button type="submit">Post Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Blog Section end -->
                </div>
                <div class="gallery-item gi-big galeria">
                    <a class="fresco" href="img/gallery/1.jpg" data-fresco-group="projects">
                        <img src="img/gallery/1.jpg" alt="">
                    </a>
                    <div class="gi-hover">
                        <img src="img/gallery/author.jpg" alt="">
                        <h6>Arthur Rose</h6>
                    </div>
                </div>
                <div class="gallery-item galeria">
                    <a class="fresco" href="img/gallery/3.jpg" data-fresco-group="projects">
                        <img src="img/gallery/3.jpg" alt="">
                    </a>
                    <div class="gi-hover">
                        <img src="img/gallery/author.jpg" alt="">
                        <h6>Arthur Rose</h6>
                    </div>
                </div>
                <div class="gallery-item galeria">
                    <a class="fresco" href="img/gallery/9.jpg" data-fresco-group="projects">
                        <img src="img/gallery/9.jpg" alt="">
                    </a>
                    <div class="gi-hover">
                        <img src="img/gallery/author.jpg" alt="">
                        <h6>Arthur Rose</h6>
                    </div>
                </div>
                <div class="gallery-item gi-big galeria">
                    <a class="fresco" href="img/gallery/10.jpg" data-fresco-group="projects">
                        <img src="img/gallery/10.jpg" alt="">
                    </a>
                    <div class="gi-hover">
                        <img src="img/gallery/author.jpg" alt="">
                        <h6>Arthur Rose</h6>
                    </div>
                </div>
                <div class="gallery-item galeria">
                    <a class="fresco" href="img/gallery/11.jpg" data-fresco-group="projects">
                        <img src="img/gallery/11.jpg" alt="">
                    </a>
                    <div class="gi-hover">
                        <img src="img/gallery/author.jpg" alt="">
                        <h6>Arthur Rose</h6>
                    </div>
                </div>
                <div class="gallery-item gi-long galeria">
                    <a class="fresco" href="img/gallery/4.jpg" data-fresco-group="projects">
                        <img src="img/gallery/4.jpg" alt="">
                    </a>
                    <div class="gi-hover">
                        <img src="img/gallery/author.jpg" alt="">
                        <h6>Arthur Rose</h6>
                    </div>
                </div>
                <div class="gallery-item gi-big galeria">
                    <a class="fresco" href="img/gallery/6.jpg" data-fresco-group="projects">
                        <img src="img/gallery/6.jpg" alt="">
                    </a>
                    <div class="gi-hover">
                        <img src="img/gallery/author.jpg" alt="">
                        <h6>Arthur Rose</h6>
                    </div>
                </div>
                <div class="gallery-item gi-big galeria">
                    <a class="fresco" href="img/gallery/5.jpg" data-fresco-group="projects">
                        <img src="img/gallery/5.jpg" alt="">
                    </a>
                    <div class="gi-hover">
                        <img src="img/gallery/author.jpg" alt="">
                        <h6>Arthur Rose</h6>
                    </div>
                </div>
                <div class="gallery-item galeria">
                    <a class="fresco" href="img/gallery/7.jpg" data-fresco-group="projects">
                        <img src="img/gallery/7.jpg" alt="">
                    </a>
                    <div class="gi-hover">
                        <img src="img/gallery/author.jpg" alt="">
                        <h6>Arthur Rose</h6>
                    </div>
                </div>



                <!-- About Section start -->
                <div class="gallery-item gi-big sobre w-100">

                    <section class="about-section">
                        <div class="about-warp">
                            <div class="about-left">
                                <div class="about-img">
                                    <img src="img/about.jpg" alt="">
                                </div>
                                <div class="profile-text text-white">
                                    <h2>Hello!</h2>
                                    <h2>I’m <strong>Glen Cross</strong></h2>
                                    <p>I photograph very instinctively. I see how it is taken like that. I do not follow
                                        certain styles, philosophies or teachers.Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                                    <a href="#" class="profile-btn">Say Hello</a>
                                    <a href="#" class="profile-email">colorlib@gmail.com</a>
                                </div>
                            </div>
                            <div class="about-right">
                                <div class="about-text">
                                    <h2>About Me</h2>
                                    <p>During your engagement shoot or portrait session I will assist and direct you through
                                        posing and expression to get you and your fiancée / partner comfortable in front of
                                        the camera so we can incorporate both posed and natural moments on your special day.
                                    </p>
                                    <p>From a fashion forward shoot to a more reserved traditional style, I am here for you.
                                    </p>
                                    <p>I love trying creative things in a fast paced environment. I adapt to any given
                                        situation and try to bring the beauty out that is already there. This is your day,
                                        lets have fun with it and make memories.</p>
                                    <p>I have won a boatload of awards for my work, and I’m grateful for every single one of
                                        them, but I’ve always been unsure of whether I earned them or whether the jury was
                                        rigged. By now I am literally addicted to making photos…for which there is no known
                                        cure, except to make more.</p>
                                    <p>I have won a boatload of awards for my work, and I’m grateful for every single one of
                                        them, but I’ve always been unsure of whether I earned them or whether the jury was
                                        rigged. By now I am literally o bring the beauty out that is already there. This is
                                        your day, lets have fun with it and make memories.</p>
                                    <p>I have won a boatload of awards for my work, and I’m grateful for every single one of
                                        them, but I’ve always been unsure of whether I earned them or whether the jury was
                                        rigged. By now I am literally addicted to making photos…for which there is no known
                                        cure, except to make more.</p>
                                    <p>I have won a boatload of awards for my work, and I’m grateful for every single one of
                                        them, but I’ve always been unsure of whether I earned them or whether the jury was
                                        rigged.</p>
                                    <h2 class="pt-5">My Skills</h2>
                                </div>
                                <div class="skill-warp text-center">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="circle-item">
                                                <div class="circle-progress" data-cpid="id-1" data-cpvalue="90"
                                                    data-cpcolor="#2916e0"></div>
                                                <h4>Photoshop</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="circle-item">
                                                <div class="circle-progress" data-cpid="id-2" data-cpvalue="95"
                                                    data-cpcolor="#2916e0"></div>
                                                <h4>Make Up</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="circle-item">
                                                <div class="circle-progress" data-cpid="id-3" data-cpvalue="80"
                                                    data-cpcolor="#2916e0"></div>
                                                <h4>Fashion</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="circle-item">
                                                <div class="circle-progress" data-cpid="id-4" data-cpvalue="85"
                                                    data-cpcolor="#2916e0"></div>
                                                <h4>Photography</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- About Section end -->

                </div>
            </div>
        </div>
    </section>


@endsection
