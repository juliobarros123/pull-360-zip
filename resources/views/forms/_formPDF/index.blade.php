<div class="form-group col-md-6 ">
    <label class="bold">Selecciona a matéria*</label>

    <input value="" type="file" class="form-control bg-white rounded-pill" name="vc_pdf" size="50MB image/*"
        placeholder="pdf" autofocus>
</div>



<div class="form-group col-md-6">
    <label class="bold">Descrição do aquivo*</label>
    <textarea type="text" value="" class="form-control bg-white rounded-pill" required name="vc_descricao_pdf"
        placeholder="Descrição do PDF">{{ isset($PDF) ? $PDF->vc_descricao_pdf : '' }}</textarea>
</div>


@if (!isset($PDF))
    <div class="form-group col-md-4">
        <label class="bold">{{ __('Vídeo*') }}</label>
        <select id="id_video" class="form-control bg-white rounded-pill select2" name="id_video" required
            autocomplete="id_video" autofocus required>


            <option value="{{ $video->id }}">{{ $video->vc_descricao }}</option>





        </select>


    </div>
@endif
