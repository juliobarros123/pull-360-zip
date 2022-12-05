

<div class="row">

   
        <div class="form-group col-md-4 ">
            <label class="bold" for="username">Título do conteúdo*</label>
            <input value="{{ isset($materia->vc_materia) ? $materia->vc_materia : '' }}" type="text"
                class="form-control bg-white rounded-pill" name="vc_materia" placeholder="Materia" autofocus required>
        </div>
  
     


        <div class="form-group col-md-4 ">
            <label class="bold" for="id_horarios">{{ __('Horário*') }}</label>
            <select class="form-control bg-white rounded-pill select2" name="id_horarios" id="id_horarios">

                @isset($materia)
                    <option value="{{ $horario['0']->id_horarios }}">
                        {{ $horario['0']->vc_classe }}ª
                        Classe/{{ $horario['0']->vc_disciplina }}/{{ $horario['0']->vc_dia }}/({{ $horario['0']->vc_hora_inicio }}-{{ $horario['0']->vc_hora_fim }})
                        / ({{ $horario['0']->ya_inicio }}/{{ $horario['0']->ya_fim }}</option>
                @endisset

                @foreach ($horarios as $horario)
                    <option value="{{ $horario->id_horarios }}">
                        {{ $horario->vc_classe }}ª
                        Classe/{{ $horario->vc_disciplina }}/{{ $horario->vc_dia }}/({{ $horario->vc_hora_inicio }}-{{ $horario->vc_hora_fim }})
                        / ({{ $horario->ya_inicio }}/{{ $horario->ya_fim }})</option>
                @endforeach


            </select>

        </div>
   


        <div class="form-group col-md-4 ">
            <label class="bold" for="it_id_classeDisciplina">{{ __('Selecciona a classe e a disciplina*') }}</label>
            <select class="form-control bg-white rounded-pill select2" name="it_id_classeDisciplina" id="it_id_classeDisciplina">

                @isset($classeDisciplina)
                    <option value="{{ $classeDisciplina['0']->id }}" selected>
                        {{ $classeDisciplina['0']->vc_classe }}ª Classe/{{ $classeDisciplina['0']->vc_disciplina }}
                    </option>
                @endisset

                @foreach ($classeDisciplinas as $classeDisciplina)
                    <option value="{{ $classeDisciplina->id }}">
                        {{ $classeDisciplina->vc_classe }}ª Classe/{{ $classeDisciplina->vc_disciplina }}</option>
                @endforeach

            </select>

        
    </div>

 
        <div class="form-group col-md-4 ">
            <label class="bold" for="dt_data_vizualizar">{{ __('Data do conteúdo*') }}</label>
            <input
                value="{{ isset($materia->dt_data_vizualizar) ? $materia->dt_data_vizualizar : '' }}"
                id="dt_data_vizualizar" type="date"
                class="form-control bg-white rounded-pill @error('dt_data_vizualizar') is-invalid @enderror" name="dt_data_vizualizar"
                required autocomplete="dt_data_vizualizar" autofocus>

            @error('dt_data_vizualizar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
  



        <div class="form-group col-md-4 ">
            <label class="bold" for="it_id_unidadeMateria">{{ __('Unidade do conteúdo:*') }}</label>
            <select class="form-control bg-white rounded-pill" name="it_id_unidadeMateria" id="it_id_unidadeMateria">

                @isset($materia)
                    <option selected value="{{ $materia->it_id_unidadeMateria }}" selected>
                        {{ $unidadeMateria->vc_unidade }}
                    </option>
                @endisset
                @if (!isset($materia))
                    <option selected disabled>Selecciona a unidade</option>
                @endif
                @foreach ($unidadesMateria as $unidadeMateria)
                    <option value="{{ $unidadeMateria->id }}">
                        {{ $unidadeMateria->vc_unidade }}</option>
                @endforeach

            </select>

   
    </div>

</div>
