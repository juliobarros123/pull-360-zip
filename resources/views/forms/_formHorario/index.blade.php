<div class="row ">

    <div class="form-group col-md-3 ">
        <label class="bold" for="inicio">Hora de início*</label>
        <input type="time" class="form-control bg-white rounded-pill " placeholder="Hora de início" name="vc_hora_inicio"
            value="{{ isset($horario['0']->vc_hora_inicio) ? $horario['0']->vc_hora_inicio : '' }}">


    </div>



    <div class="form-group col-md-3 ">
        <label for="fim" class="bold">Hora de fim*</label>
        <input type="time" class="form-control bg-white rounded-pill " placeholder="Hora de fim" name="vc_hora_fim"
            value="{{ isset($horario['0']->vc_hora_fim) ? $horario['0']->vc_hora_fim : '' }}">


    </div>






    <div class="form-group col-md-3  ">
        <label for="dia" class="bold" >Selecciona o dia da semana*</label>
        <select type="text" class="form-control bg-white rounded-pill buscarDiasSemana border-secondary " name="it_id_dias">

            @if (isset($horario['0']))
                <option value="{{ $horario['0']->id_dias_semana }}" selected disabled>{{ $horario['0']->vc_dia }}
                </option>
            @else
                <option value="" selected disabled>Dia da semana</option>
            @endif


            @foreach ($dias as $dia)
                <option value="{{ $dia->id }}">{{ $dia->vc_dia }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-3 ">

        <label class="bold"  for="id_classe_disciplinas">{{ __('Selecciona a classe e a disciplina*') }}</label>
        <select class="form-control bg-white rounded-pill select2 " name="it_id_classedisciplina" id="id_classe_disciplinas" required>

            @if (isset($horario['0']))
                <option value="{{ $horario['0']->id_c_d }}" selected disabled>{{ $horario['0']->vc_classe }}ª
                    Classe|{{ $horario['0']->vc_disciplina }} </option>
            @else
                <option value="" selected disabled>Classe e disciplina*</option>
            @endif

            @foreach ($classesDisciplinas as $classeDisciplina)
                <option value="{{ $classeDisciplina->id_c_d }}">{{ $classeDisciplina->vc_classe }}ª
                    Classe|{{ $classeDisciplina->vc_disciplina }} </option>
            @endforeach



        </select>


    </div>



    <div class="form-group col-md-3 ">
        <label class="bold"  for="it_id_anoslectivos">{{ __('Selecciona o ano lectivo*') }}</label>
        <select class="form-control bg-white rounded-pill buscarAnoLetivo" name="it_id_anoslectivos" id="it_id_anoslectivos">
            @isset($horario['0'])
                <option value="{{ $horario['0']->it_id_anoslectivos }}" selected>
                    {{ $horario['0']->ya_inicio }}-{{ $horario['0']->ya_fim }}</option>
            @endisset

            @if (isset($anosLectivo))
            <option value="" selected disabled>Ano lectivo</option>
                @foreach ($anosLectivo as $anoLectivo)
                    <option value="{{ $anoLectivo->id }}">{{ $anoLectivo->ya_inicio }}-{{ $anoLectivo->ya_fim }}
                    </option>
                @endforeach
            @else

                @if (isset($anoLectivo))
                    <option value="{{ $anoLectivo->id }}">{{ $anoLectivo->ya_inicio }}-{{ $anoLectivo->ya_fim }}
                    </option>
                @endif
            @endif

        </select>



    </div>
</div>
