@extends('layouts._includes.admin.app')

@section('titulo', 'Fale connosco')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Fale connosco </h5>

            <script src="/js/sweetalert2.all.min.js"></script>


            <div class="custom-table table-responsive radius-top-3">
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="">


                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">MENSAGEM</th>


                        </tr>
                    </thead>

                </table>
            </div>
            Exception
        </div>

    </div>


    </div>
    </div>

    @if (session('eliminar'))
        <script>
            Swal.fire(
                'Escola Eliminada com sucesso!',
                '',
                'success'
            )
        </script>
    @endif

@endsection
