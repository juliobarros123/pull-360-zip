
@extends('layouts._includes.admin.app')

@section('titulo', ' Editar Ano Lectivo')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
         
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
                <h5>   Editar ano lectivo <b>{{ $anolectivo->ya_inicio . '-' . $anolectivo->ya_fim }}</b></h5>
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">


                <form action=" {{ route('admin/anolectivo/atualizar', $anolectivo->id) }}" method="post" >
                    @csrf
                    @method('PUT')
              
                        @include('forms._formAnoLectivo.index')
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Editar</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
@endsection
