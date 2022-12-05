
@extends('layouts._includes.admin.app')

@section('titulo', 'Editar Professor|Escola')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Editar Professor|Escola</h5>
        <div class="w-100 bg-white shadow p-4 h-100 my-3 rounded">
            <form  action="{{ route('professor.atualizar', $professorEscola['0']->id_fun_escola) }}" method="post"  enctype="multipart/form-data">
                @method('put')
                @csrf


                @include('forms._formProfessor.index')
             
              
                <div class="">
                    <button type="submit" class="btn mt-3 btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                        <div class="text-uppercase text-increase">Confirmar alterações</div>
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
                'Professor vinculado com  sucesso',
                '',
                'success'
            )
        </script>
    @endif


    @if (session('up'))

        <script>
            Swal.fire(
                'Professor actualizado com  sucesso',
                '',
                'success'
            )
        </script>
    @endif


@endsection

