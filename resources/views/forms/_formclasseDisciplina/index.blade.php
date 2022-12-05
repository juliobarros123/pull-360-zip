<div class="row">
    <div class="form-group col-md-4 ">
        <label class="bold" for="classe_id">{{ __('Selecciona a classe*') }}</label>
        <select class="form-control bg-white rounded-pill" name="classe_id" id="classe_id" required>




            <option value="{{ $classe->id }}">{{ $classe->vc_classe }}ª classe </option>
            </option>


        </select>

    </div>



    <div class="form-group col-md-4 ">
        <label class="bold" for="disciplina_id">{{ __('Selecciona a disciplina*') }}</label>
        <select class="form-control bg-white rounded-pill" name="disciplina_id" id="disciplina_id" required>
            @isset($classeDisciplina['0'])
                <option value="{{ isset($classeDisciplina) ? $classeDisciplina['0']->disciplina_id : '' }}" selected
                    disabled>
                    {{ isset($classeDisciplina['0']->vc_disciplina)? $classeDisciplina['0']->vc_disciplina: 'Selecciona a Disciplina:' }}
                </option>
            @endisset
            @foreach ($disciplinas as $disciplina)
                <option value="{{ $disciplina->id }}">{{ $disciplina->vc_disciplina }} </option>
            @endforeach

        </select>

    </div>
</div>
