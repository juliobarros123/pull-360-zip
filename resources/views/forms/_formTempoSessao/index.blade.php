<div class="row">

    <div class="form-group col-md-6 ">
        <label class="bold" for="afirmacoa_correta">Tempo de início de contagem(hh:mm)*</label>
        <input type="time" name="tempo_contagem" class="form-control bg-white rounded-pill"
            value="{{ isset($tempo_sessao) ? $tempo_sessao->tempo_contagem : '' }}">
    </div>



    <div class="form-group col-md-6 ">
        <label class="bold" for="afirmacoa_correta">Tempo de término (hh:mm)*</label>
        <input type="time" name="tempo_termino" class="form-control bg-white rounded-pill"
            value="{{ isset($tempo_sessao) ? $tempo_sessao->tempo_termino : '' }}">
    </div>

</div>
