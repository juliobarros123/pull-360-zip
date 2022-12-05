
@extends('layouts._includes.admin.app')

@section('titulo', ' Editar Agente')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
         
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
                <h5>   Editar agente</h5>
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form action=" {{ route('dependencias.professor.actualizar', $dependencia->id) }}" method="post" >
                    @csrf
                    @method('PUT')
              
                    @include('forms._formDependenciaProfessor.index')
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Editar</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
    <script src="/js/sweetalert2.all.min.js"></script>

    @if (session('error'))
        <script>
            Swal.fire(
                'Falha ao cadastrar agente !',
                'Provavelmente número de BI já existe',
                'error'
            )
        </script>
    @endif

@endsection
