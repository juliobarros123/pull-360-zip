@extends('layouts._includes.admin.app')

@section('titulo', 'Importar excel de professores')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Importar excel de professores</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">
                <form class="style-1" action="{{ route('admin.users.excel.importarExecutar') }}" method="post" class="row" enctype="multipart/form-data">
                    @csrf
    
               @include('forms._formImportExcel.index')


                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Importar</div>
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
                'Importação feita com sucesso!',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('aviso'))
        <script>
            Swal.fire(
                'Erro ao importar arquivo!',
                'Todos os campos do arquivo devem ser preenchido!',
                'error'
            )
        </script>
    @endif

@endsection
