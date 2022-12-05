<div class="row">
    <div class="form-group col-md-4">
        <label class="bold" for="id_classe_disciplinas">{{ __('Selecciona a classe e a disciplina*') }}</label>
        <select class="form-control bg-white rounded-pill select2" name="it_id_classedisciplina" id="id_classe_disciplinas" required>
            @if (isset($questao))
                <option value="{{ $questao->id_classe_disciplina }}" selected >
                    {{ $questao->vc_classe }}ª
                    Classe|{{ $questao->vc_disciplina }} </option>
            @else
                <option value="" selected disabled>Classe e disciplina</option>
            @endif

            @foreach ($classes_disciplinas as $classe_disciplina)

                <option value="{{ $classe_disciplina->id }}">{{ $classe_disciplina->vc_classe }}ª
                    Classe|{{ $classe_disciplina->vc_disciplina }} </option>



            @endforeach



        </select>


    </div>

    <div class="form-group col-md-4">
        <label class="bold" for="id_nivel">{{ __('Selecciona o nível*') }}</label>
        <select class="form-control bg-white rounded-pill" name="id_nivel" id="id_nivel" required>
            @if (isset($questao))
                <option value="{{ $questao->id_nivel }}" selected >
                    {{ $questao->nivel }} </option>
            @else
                <option value="" selected disabled> nível</option>
            @endif
            @foreach ($niveis as $nivel)
                <option value="{{ $nivel->id }}">{{ $nivel->nivel }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
        <label class="bold" for="id_categoria">{{ __('Seleciona o categoria*') }}</label>
        <select class="form-control bg-white rounded-pill" name="id_categoria" id="id_categoria" required>
            @if (isset($questao))
                <option value="{{ $questao->id_categoria }}" selected >
                    {{ $questao->categoria }} </option>
            @else
                <option value="" selected disabled>Selecciona a categoria</option>
            @endif
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="form-group col-md-12">
    <label  class="bold" for="questao">Questão:*</label>
    <textarea rows="6" style="border-radius: 1rem!important;" cols="20" class="form-control bg-white rounded-pill" name="questao">{{ isset($questao)?$questao->questao:'' }}
</textarea>
</div>

<div class="d-flex  flex-row-reverse col-md-12 row">
    <i class="fas fa-reply p-2" id="mais_resposta"></i>
    <i class="fas fa-images p-2  " id="mais_resposta_file"></i></i>
</div>

<div id="div_principal" class="row form-group">

</div>
<div class="form-group  col-md-12">
    <label class="bold" for="afirmacoa_correta">Selecciona a afirmação correcta:*</label>
    <select class="form-control bg-white rounded-pill" name="afirmacoa_correta" id="afirmacoa_correta">
        <option desabled>Escolhe a afirmação</option>
        

    </select>
</div>  

<div class="form-group">
    <label class="bold" for="afirmacoa_correta">Tempo Limite(hh:mm)*</label>
    <input type="time" name="time" value="{{ isset($questao)?$questao->time:'' }}" class="form-control bg-white rounded-pill">
</div>
<script>
    $("#mais_resposta").click(function() {
        var tamanho = $('#div_principal>div').length + 1;
        $("#div_principal").append(
            ' <div class="form-group col-sm-4"> <label class="bold" for="questao">Reposta ' + tamanho + ':*</label>   <input class="form-control bg-white rounded-pill" required type="text" placeholder=" Digita aqui a ' +
            tamanho + 'ª resposta" name="resposta' + tamanho + '"></div>');
            adicionar_afirmacao(tamanho);
    });
    $("#mais_resposta_file").click(function() {
        var tamanho = $('#div_principal>div').length + 1;
        $("#div_principal").append(
            '<div class="form-group col-sm-4"> <label class="bold" for="questao">Reposta ' + tamanho + ':*</label>   <input class="form-control bg-white rounded-pill" type="file"  name="resposta' + tamanho + '"></div>');
            adicionar_afirmacao(tamanho);
    });

    function adicionar_afirmacao(id) {
        $('#afirmacoa_correta')
            .append('<option value="' + id + '">' + id + 'ª Afirmação </option>');
    }

   
</script>
