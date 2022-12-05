@extends('layouts._includes.admin.app')

@section('titulo', ' Adicionar educando')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Adicionar educando</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
                
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">
               
                @php
                $id_user = Auth::user()->id;
            @endphp
            <form action="{{ url("$id_user/users/escreverFilho") }}" method="post" class="style-1"
                enctype="multipart/form-data">
             @csrf
    
                    @include('forms._formEducando.index')


                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Próximo</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/sweetalert2.all.min.js"></script>

              
            
    @if (session('idade'))
    <script>
        Swal.fire(
            'Falha ao Adicionar educando(a)!',
            'Idade inferior a 5 anos.',
            'error'
        )

    </script>
    @endif       
    @if (session('error2'))
    <script>
        Swal.fire(
            'Falha ao Adicionar educando!',
            'Email existente ou senhas diferentes ',
            'error'
        )

    </script>
@endif
    @if (session('error'))
    <script>
        Swal.fire(
            'Seleciona a foto!',
            '',
            'error'
        )

    </script>

    
@endif

@endsection
