

    {{ Str::limit($mensagem, 90, '...') }}
    <small  data-toggle="modal" class="text-primary" data-target="#signupModal{{ $id }}">
    Ver mais
    </small>
<div class="modal modal-sign-up fade" id="signupModal{{ $id }}" tabindex="-1" aria-labelledby="signupModalLabel{{ $id}}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0">
            <div class="modal-body px-4">
                <h5 class="font-weight-bold text-secondary text-center">

                    {{ $nome  }}
                </h5>

                 <div class="description-15 font-weight-light text-secondary text-center h1 my-4">{{ $mensagem}}</div>
               
            </div>
        </div>
    </div>
</div>