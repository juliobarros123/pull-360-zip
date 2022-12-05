{{-- 

@extends('layouts._includes.admin.app')

@section('titulo', 'Editar Classe')

@section('conteudo')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                Editar Classe
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form form action="{{ route('classes.actualizar', $classe->id) }}" method="post" class="row">
                @method('put')
                @csrf
                @include('forms._formClasse.index')

               
                <div class="form-group col-sm-4">
                    <label for="" class="text-white form-label">.</label>
                    <button class="form-control btn btn-dark">Confirmar</button>
                </div>
            </form>

        </div>
    </div>
  
    <!-- Footer-->


    <script src="/js/sweetalert2.all.min.js"></script>

 
   
    @if (session('has'))
        <script>
            Swal.fire(
                'Falha ao actualizar Classe!',
                'Classe já existe',
                'error'
            )
   
        </script>
    @endif
@endsection

 --}}






@extends('layouts._includes.admin.app')

@section('titulo', ' Editar classe')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5> Editar classe</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
                <script src="/js/sweetalert2.all.min.js"></script>
                @if (session('teste'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Classe Inexistente',
                    })
                </script>
            @endif
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">



                <form form action="{{ route('classes.actualizar', $classe->id) }}" method="post">
                    @method('put')
                    @csrf
                    @include('forms._formClasse.index')
    
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Editar</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  <!-- sweetalert -->
  <script src="/js/sweetalert2.all.min.js"></script>

 
   
  @if (session('has'))
      <script>
          Swal.fire(
              'Falha ao actualizar classe!',
              'Classe já existe',
              'error'
          )
 
      </script>
  @endif
@endsection
