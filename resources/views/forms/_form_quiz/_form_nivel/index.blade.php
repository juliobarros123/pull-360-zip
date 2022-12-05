<div class="row">
    <div class="form-group col-md-12">
        <label for="afirmacao1" class="bold">Nível:*</label>
        <input class="form-control bg-white rounded-pill" type="text" placeholder="Nível de jogo"
            value="{{ isset($nivel) ? $nivel->nivel : '' }}" name="nivel">
    </div>
</div>
