




@extends('layouts._includes.admin.app')

@section('titulo', '  Adicionar áudio')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>  Adicionar áudio</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form action="{{ url("/materia/uploadaudio/$video->id_materia")}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                    @include('forms._formAudio.index')
                </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Adicionar</div>
                        </button>
                    </div>
             
                </form>
            </div>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('status'))
                <script>
                    Swal.fire(
                        'Ficheiro adicionado com sucesso',
                        '',
                        'success'
                    )
                </script>
            @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar usuário!',
                'Email existente ou senhas diferentes ou mesmo nome de usuário existente ',
                'error'
            )

        </script>
    @endif
    <!-- Footer-->


@endsection
