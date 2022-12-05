
<div class="row">


              <div class="form-group col-md-4 toggle-password">
                <label class="bold" for="phone" >{{ __('Senha actual*') }}</label>
                <input  type="password"
                    class="form-control  rounded-pill input-- @error('password') is-invalid @enderror" placeholder="Senha"
                    name="password" required autocomplete="new-password" >
                <i class="fas fa-eye text-muted toggler"></i>
            </div>
        
        <div class="form-group col-md-4 toggle-password">
            <label class="bold" for="phone" id="label-senha">{{ __('Nova senha*') }}</label>
            <input id="password" type="password"
                class="form-control  rounded-pill input-- @error('password') is-invalid @enderror" 
                name="nova_passe" required autocomplete="new-password" placeholder="Nova senha">
            <i class="fas fa-eye text-muted toggler"></i>
        </div>

        <div class="form-group col-md-4 toggle-password">
            <label class="bold" for="phone">{{ __('Confirmar a senha*') }}</label>
            <input id="password" type="password"
                class="form-control  rounded-pill input-- @error('password') is-invalid @enderror"
                placeholder="Confirmar nova senha " name="password_confirmation" required autocomplete="new-password">
            <i class="fas fa-eye text-muted toggler"></i>
        </div>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

      
    


</div>
