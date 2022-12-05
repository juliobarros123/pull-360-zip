@extends('layouts._includes.admin.app')

@section('titulo', ' Adicionar escola')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Adicionar escola</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">



                @php
                    $id_user = Auth::user()->id;
                @endphp
                <form action="{{ url("escolas/$id_user/cadastrar") }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('forms._formEscola.index')
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
                'Escola adicionada com sucesso!',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Falha ao cadastrar escola!',
                'Email existente ou senhas diferentes ou mesmo nome de usuário existente ',
                'error'
            )
        </script>
    @endif
@endsection
