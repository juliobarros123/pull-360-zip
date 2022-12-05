<div class="row">
    <div class="form-group col-md-4 ">
        <label class="bold" for="vc_normativo">{{ __('Título do documento*') }}</label>
        <input value="{{ isset($normativo->vc_normativo) ? $normativo->vc_normativo : '' }}" id="vc_normativo" type="text"
            class="form-control bg-white rounded-pill @error('vc_normativo') is-invalid @enderror" name="vc_normativo"
            placeholder="Título" value="{{ old('vc_normativo') }}" required autocomplete="vc_normativo"
            autofocus>

        @error('vc_normativo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-4 ">
        <label class="bold" for="vc_caminho">{{ __('Documento*') }}</label>
        <input value="{{ isset($normativo->vc_caminho) ? $normativo->vc_caminho : '' }}" id="vc_caminho" type="file"
            class="form-control bg-white rounded-pill @error('vc_caminho') is-invalid @enderror" name="vc_caminho"
            placeholder="Título" value="{{ old('vc_caminho') }}"  autocomplete="vc_caminho"
            autofocus>

        @error('vc_caminho')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-4 ">
        <label class="bold" for="dt_data_publicao">{{ __('Data de publicação*') }}</label>
        <input value="{{ isset($normativo->dt_data_publicao) ? $normativo->dt_data_publicao : '' }}" id="dt_data_publicao" type="date"
            class="form-control bg-white rounded-pill @error('dt_data_publicao') is-invalid @enderror" name="dt_data_publicao"
            placeholder="Título" value="{{ old('dt_data_publicao') }}" required autocomplete="dt_data_publicao"
            autofocus>

        @error('dt_data_publicao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
   

  
    <div class="form-group col-md-12">
        <label  class="bold" for="questao">Descrição do documento*</label>
        <textarea rows="6" cols="20" class="form-control bg-white rounded-pill" name="vc_descricao">{{ isset($normativo)?$normativo->vc_descricao:'' }}
    </textarea>
    </div>
    
</div>



