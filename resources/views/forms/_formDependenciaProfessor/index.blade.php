<div class="row">

    <div class="form-group col-sm-4">
      
       
        
            <label class="bold" for="vc_provincia">{{ __('Província*') }}</label>
            <select class="buscarEscola form-control bg-white rounded-pill select2" name="vc_provincia" id="vc_provincia" required>
                @foreach (['Benguela', 'Bié', 'Cabinda', 'Cunene', 'Huambo', 'Huíla', 'Kuando Kubango', 'Kwanza Norte', 'Kwanza Sul', 'Luanda', 'Lunda Norte', 'Lunda Sul', 'Malange', 'Moxico', 'Namibe', 'Uíge', 'Zaire'] as $item)
                <option value="{{ $item }}">{{ $item}}</option>
                @endforeach
            </select>
        
    </div>
    <div class="form-group col-sm-4">
        <label for="" class="bold">Nome do professor*</label>
        <input type="text" class="form-control bg-white rounded-pill" placeholder="Digite o nome do professor"
            name="vc_professor" value="{{ isset($dependencia->vc_professor) ? $dependencia->vc_professor : '' }}"
            required>
    </div>
    <div class="form-group col-sm-4">
        <label for="" class="bold">Número de bilhete de identidade*</label>
        <input type="text" class="form-control bg-white rounded-pill"
            placeholder="Digite o número de bilhete de identidade" name="vc_BI"
            value="{{ isset($dependencia->vc_BI) ? $dependencia->vc_BI : '' }}" required maxlength="14">
    </div>
    <div class="form-group col-sm-4">
        <label for="" class="bold">Número de agente*</label>
        <input type="number" class="form-control bg-white rounded-pill" placeholder="Digite o número de agente"
            name="it_numero_agente"
            value="{{ isset($dependencia->it_numero_agente) ? $dependencia->it_numero_agente : '' }}" required>
    </div>
</div>
