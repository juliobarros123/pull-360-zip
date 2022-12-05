@extends('layouts._includes.admin.app')

@section('titulo', 'Lista de Professores')

@section('conteudo')
    <div class="page-wrapper p-2 p-md-5">
        <div class="p-3">
            <h5 class="mb-5">Lista de professores</h5>
            {{-- <div class="w-100 bg-white shadow p-4 h-100 my-3 rounded">
            <form class="style-1">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bold" for="year">Ano Lectivo</label>
                                <input type="text" class="form-control bg-white rounded-pill "
                                id="year" placeholder="Selecionar o ano">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bold" for="gradesubject">Classe</label>
                                <select name="gradesubject" id="gradesubject" class="form-control bg-white rounded-pill ">
                                    <option value="" selected>1ª Classe</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bold" for="theme">Disciplina</label>
                                <select name="theme" id="theme" class="form-control bg-white rounded-pill ">
                                    <option value="" selected>Língua Portuguesa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn mt-3 btn-sm px-3 btn-secondary rounded-pill  d-block mx-auto ">
                        <div class="text-uppercase text-increase">Finalizar</div>
                    </button>
                </div>
            </form>
        </div> --}}

            <div class="custom-table table-responsive radius-top-3" >
                <table class="table mb-0" id="dataTable">
                    <thead class="table-blue small">
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">FOTO</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">TELEFONE</th>
                            <th scope="col">ACÇÕES</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white shadow">
                        @if ($professores)
                            @foreach ($professores as $professor)
                                <tr class="text-muted text-center small">
                                    <td>{{ $professor->id }}</td>
                                    <td>{{ $professor->vc_primemiroNome . ' ' . $professor->vc_apelido }}</td>
                                    <td><img src="{{ url("storage/{$professor->profile_photo_path}") }}"
                                            alt="{{ $professor->vc_primeiroNome . ' ' . $professor->vc_ultimoNome }}"
                                            width="40">
                                    </td>
                                    <td>{{ $professor->vc_email }}</td>
                                    <td>{{ $professor->vc_telefone }}</td>


                                    <td>


                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
                {{-- <div class="d-flex justify-content-end p-3">
                    {{ $professores->onEachSide(5)->links() }}
                </div> --}}
            </div>

        </div>
    </div>






@endsection
