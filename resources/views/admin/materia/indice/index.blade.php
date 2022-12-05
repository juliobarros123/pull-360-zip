@extends('layouts._includes.admin.app')
@section('titulo', 'Home')
@section('conteudo')
    <div class="page-wrapper p-2 p-md-5 ">
        <div class="p-3">





        


        @if (Auth::User()->vc_tipoUtilizador == 'Filho' || Auth::User()->vc_tipoUtilizador == 'Aluno' || Auth::User()->vc_tipoUtilizador == 'Professor')
            <div style="margin: 0 -1em" class="d-flex w-100 flex-wrap mt-3">
                {{-- <div class="col-12 col-md-12 col-xl-12 mb-4">
          
                    <div class="bg-white shadow rounded p-4 col-md-12">

                        <div class="row">

                            <div class="col-md-6 bg-secundary p-5 mx-auto">
                                <div class="shadow-sm p-4">
                                    <h5 class="text-center">Seja Bem-Vindo </h5>

                                    <div class="p-4">
                                        <p class="small font-weight-bold">Que bom ter você de Volta!</p>
                                        <p class="small font-weight-bold">Pronto para mais uma jornada de Aprendizado ?
                                        </p>

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('site/capa.jpg') }}" class="img-fluid" alt="" width="100%">
                            </div>



                        </div>





                    </div>
                </div>
                --}}
                <div class="col-12 col-md-12 col-xl-12 mb-4" style="margin-top: -1.2em;">
                    <h5 class="mb-4">Aulas em curso sobre <strong>{{ $classeDisciplina->vc_disciplina }}</strong></h5>
                    <div class="bg-white shadow rounded ">
                        @foreach ($materias as $item)
                            <div class="shadow p-4 d-flex justify-content-between align-items-center border-bottom py-3">
                                <div> <i class="fas fa-film"></i>
                                    <span class="ml-3 text-muted small">

                                        {{ $item->id_m }}ª Aula/{{ $item->vc_materia }}

                                    </span>
                                </div>
                                <div>
                                    <a style="font-size: 10px;"
                                        href="{{ route('materia.aluno', ['id' => $classeDisciplina->id, 'id_unidade' => $item->it_id_unidadeMateria]) }}"
                                        class="btn btn-secondary-reverse rounded-pill btn-sm px-2">CONTINUAR A
                                        VER</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
              
            </div>
        @endif

    </div>
    </div>


@endsection
