<div class="row">
    <div class="form-group col-md-8 ">
        <label class="bold" for="vc_unidade">{{ __('Unidade temática*') }}</label>
        <input value="{{ isset($unidade->vc_unidade) ? $unidade->vc_unidade : '' }}" id="vc_unidade" type="text"
            class="form-control bg-white rounded-pill @error('vc_unidade') is-invalid @enderror" name="vc_unidade"
            placeholder="Tema" value="{{ old('vc_unidade') }}" required autocomplete="vc_unidade"
            autofocus>

        @error('vc_unidade')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>
