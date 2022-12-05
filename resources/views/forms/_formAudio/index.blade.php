
    <div class="form-group col-md-6">
        <label class="bold" >Título do áudio*</label>
     
        <input type="text" class="form-control bg-white rounded-pill" name="vc_descricao" value="{{isset($audio)?$audio->vc_descricao:''}}"
            placeholder="Insira um nome ao áudio" required autofocus>
    </div>


    <div class="form-group col-md-6">
        <label class="bold">Selecciona o áudio*</label>

        <input  type="file" class="form-control bg-white rounded-pill" name="vc_audio" required   size="50MB audio/mp3" value="{{isset($audio)?$audio->vc_audio:''}}"
            autofocus>
    </div>
    @if (!isset($audio))
    <div class="form-group col-md-4">
        <label class="bold">{{ __('Vídeo*') }}</label>
        <select id="id_video" class="form-control bg-white rounded-pill select2" name="id_video" required
            autocomplete="id_video" autofocus required>


            <option value="{{ $video->id }}">{{ $video->vc_descricao }}</option>





        </select>


    </div>
@endif





