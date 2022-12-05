

   <div class="modal fade bd-example-modal-lg{{ $foto->id_foto }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Deixe um comentário</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Oloco, meu!</strong> Olha esse alerta animado, como é chique!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> --}}
            <div class="comment-option nice-scroll" id="comment-option-{{ $foto->id_foto }}">
                <h3 id="ttl-comentarios-{{ $foto->id_foto }}"></h3>
               
               
               
            </div>
            <div class="comment-form mt-3">

                <form action="{{ route('comentarios.foto-galeria.cadastrar', $foto->id_foto) }}" method="POST">
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
  