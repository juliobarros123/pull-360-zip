<div class="row">
    <div class="form-group col-md-12">
        <label class="bold" for="afirmacao1">Categoria:*</label>
        <input class="form-control bg-white rounded-pill" type="text" placeholder="Categoria do quiz"
            value="{{ isset($categoria) ? $categoria->categoria : '' }}" name="categoria">
    </div>
</div>
