<div class="row">
    <div class="form-group col-md-3 ">
        <label class="bold" for="vc_imagem">{{ __('Imagem*') }}</label>
        <input value="{{ isset($disciplina->vc_imagem) ? $disciplina->vc_imagem : '' }}" id="vc_imagem"
            type="file" class="form-control bg-white rounded-pill @error('vc_imagem') is-invalid @enderror" name="vc_imagem"
           value="{{ old('vc_imagem') }}"  autocomplete="vc_imagem" autofocus>

        @error('vc_imagem')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="form-group col-md-8">
        <label class="bold" for="vc_disciplina">{{ __('Nome*') }}</label>
        <input value="{{ isset($disciplina->vc_disciplina) ? $disciplina->vc_disciplina : '' }}" id="vc_disciplina"
            type="text" class="form-control bg-white rounded-pill @error('vc_disciplina') is-invalid @enderror" name="vc_disciplina"
            placeholder="Designação da disciplina" value="{{ old('vc_disciplina') }}" required autocomplete="vc_disciplina" autofocus>

        @error('vc_disciplina')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

