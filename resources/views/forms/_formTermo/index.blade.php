
<div class="col-md-12">
    <label class="bold" for="vc_tipoUtilizador">{{ __('Nível*') }}</label>
    <select id="ii_user" type="text" class="form-control border-secondary col-md-12" name="vc_tipoUtilizador" required>
        @isset($termo)
            <option value="{{ isset($termo->vc_tipoUtilizador) ? $termo->vc_tipoUtilizador : '' }}">
                {{ $termo->vc_tipoUtilizador }}</option>
       
        @endisset
        @if (!isset($termo))
        <option disabled value="" selected>Selecciona o nível de acesso</option>
        @endif
      
            <option value="Administrador">Administrador</option>
            <option value="Professor">Professor</option>
            <option value="Encarregado">Encarregado</option>
            <option value="Filho">Educando</option>
            <option value="Chefe departamento provincial">Chefe departamento provincial</option>
            <option  value="Diretor Municipal"> Director Municipal</option>
            @if (Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
            <option value="Desenvolvedor">Desenvolvedor</option>
            @endif
    </select>
</div>

<div class="col-md-12">
    <div class="form-group ">
        <label class="bold" for="vc_termo">{{ __('Termo:*') }}</label>
        <textarea  id="vc_termo"  rows="6" cols="30" 
            type="text" class="form-control @error('vc_termo') is-invalid @enderror" name="vc_termo"
            placeholder="Digita aqui o termo"  required autocomplete="vc_termo" autofocus>
            {{ isset($termo->vc_termo) ? $termo->vc_termo : '' }}
        </textarea>

        @error('vc_termo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


{{-- <script src="[ckeditor-build-path]/ckeditor.js"></script> --}}



