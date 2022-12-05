



@extends('layouts._includes.admin.app')

@section('titulo', ' Editar PDF')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Editar PDF</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}

            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form action="{{ url("/materia/uploadPDFEditar/$PDF->id")}}" method="POST" enctype="multipart/form-data">
                    @method('put')

@csrf
                    <div class="row">
                        @include('forms._formPDF.index')
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Confirmar</div>
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
                'Usuário Cadastrado',
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
    @if (session('up'))
    <script>
        Swal.fire(
            'Ficheiro actualizado com sucesso',
            '',
            'success'
        )

    </script>
@endif

@endsection
