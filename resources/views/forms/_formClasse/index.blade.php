<div class="row">
    <div class="form-group col-md-12">
        <label for="vc_classe" class="bold">{{ __('Nome*') }}</label>
        <input value="{{ isset($classe->vc_classe) ? $classe->vc_classe : '' }}" id="vc_classe" type="text"
            class="form-control bg-white rounded-pill @error('vc_classe') is-invalid @enderror" name="vc_classe"
            placeholder="Designação da classe" value="{{ old('vc_classe') }}" required autocomplete="vc_classe" autofocus>

        @error('vc_classe')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
