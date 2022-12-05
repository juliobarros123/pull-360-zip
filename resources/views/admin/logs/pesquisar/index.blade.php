
@extends('layouts._includes.admin.app')

@section('titulo', 'Pesquisar registros')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5>Pesquisar registros</h5>
            {{-- <div class="text-muted">Para continuar a usar esta conta deve terminar de preencher os seus dados
                da conta de utilizador</div> --}}
            <script src="/js/sweetalert2.all.min.js"></script>
            @if (session('teste'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Registros Inexistente',
                    })
                </script>
            @endif
            <div class="w-100 bg-white shadow p-4 h-100 mt-3 rounded">

                <form action="{{ url('admin/logs/recebelogs') }}"  method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="vc_anolectivo" class="bold" >Selecciona o ano lectivo*</label>
                            <select name="vc_anolectivo" id="vc_anolectivo" class="form-control bg-white rounded-pill">
                                <option value="Todos">Todos</option>
                                @foreach ($anos as $ano)
                                    <option value="{{ $ano->ano }}">
                                        {{ $ano->ano }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-5">
                            <label for="vc_nome" class="bold">Selecciona o utilizador*</label>
                            <select name="vc_nome" id="vc_nome" class="form-control bg-white rounded-pill select2">
                                <option value="Todos">Todos</option>
                                @foreach ($utilizadores as $utilizador)
                                    <option value="{{ $utilizador->id }}">
                                        {{ $utilizador->vc_primemiroNome . ' ' . $utilizador->vc_apelido }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                            <div class="text-uppercase text-increase">Pesquisar</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- sweetalert -->
   


 
    <!-- Footer-->
@endsection
