<div class="row"></div>
<div class="form-group col-sm-12">
    <label class="bold" for="it_id_anoLectivo">{{ __('Ano Lectivo*') }}</label>
    <select class="form-control bg-white rounded-pill" name="it_id_anoLectivo" id="it_id_anoLectivo">



        <option value="0" selected>todos os anos</option>


        @foreach ($anoLectivos as $anoLectivo)
            <option value="{{ $anoLectivo->id }}">{{ $anoLectivo->ya_inicio }}-{{ $anoLectivo->ya_fim }}</option>
        @endforeach


    </select>

</div>
</div>


