

   <div class="modal fade bd-example-modal-lg{{ $foto->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Deixe um comentário</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="comment-option nice-scroll" >
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

                <form action="{{ route('comentarios.foto-galeria.cadastrar', $foto->id) }}" method="POST">
                  @csrf
                 <div class="row">
                        {{-- <div class="col-md-4">
                     <input type="text" placeholder="Name">
                 </div>
                 <div class="col-md-4">
                     <input type="text" placeholder="Email">
                 </div>
                 <div class="col-md-4">
                     <input type="text" placeholder="Phone">
                 </div> --}}
                        <div class="col-md-12">
                            <textarea placeholder="O que você acha?"  name="comentario"></textarea>
                            <button type="submit">Postar comentário</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  