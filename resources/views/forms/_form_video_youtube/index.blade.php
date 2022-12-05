<div class="form-group col-md-6">
    <label class="bold">Titulo do video*</label>

    <input type="text" class="form-control bg-white rounded-pill" name="vc_descricao"
        value="{{ isset($video_youtube) ? $video_youtube->vc_descricao : '' }}" placeholder="Insira um nome ao video"
        autofocus>
</div>
<div class="form-group col-md-6 ">
    <label class="bold"> <strong>Video do youtube*</strong> </label>
    <input type="text" class="form-control bg-white rounded-pill" name="vc_link" size="50MB video/mp4"
        value="{{ isset($video_youtube) ? $video_youtube->vc_link : '' }}" autofocus
        placeholder="Coloca aqui o incorporador">
</div>
