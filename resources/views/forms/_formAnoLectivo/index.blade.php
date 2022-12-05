<div class="row">
    <div class="form-group col-sm-4">
        <label for=""  class="bold">Inicio do ano lectivo*</label>
        <input type="number" class="form-control bg-white rounded-pill" placeholder="Digite o ano de início"
            name="ya_inicio" value="{{ isset($anolectivo->ya_inicio) ? $anolectivo->ya_inicio : '' }}" required>
    </div>
    <div class="form-group col-sm-4">
        <label for="" class="bold">Fim do ano lectivo*</label>
        <input type="number" class="form-control bg-white rounded-pill" placeholder="Digite o ano de fim" name="ya_fim"
            value="{{ isset($anolectivo->ya_fim) ? $anolectivo->ya_fim : '' }}" required>
    </div>
</div>
