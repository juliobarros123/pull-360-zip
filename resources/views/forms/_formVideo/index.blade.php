
    <div class="form-group col-md-6">
        <label class="bold" >Título do video*</label>
     
        <input type="text" class="form-control bg-white rounded-pill" name="vc_descricao" value="{{isset($video)?$video->vc_descricao:''}}"
            placeholder="Insira um nome ao video" required autofocus>
    </div>


    <div class="form-group col-md-6">
        <label class="bold">Selecciona o video*</label>

        <input  type="file" class="form-control bg-white rounded-pill" name="vc_video"   size="50MB video/mp4" value="{{isset($video)?$video->vc_video:''}}"
            autofocus>
    </div>

    <div class="form-group col-md-6">
        <label class="bold" >O professor*</label>
     
        <input type="text" class="form-control bg-white rounded-pill" name="vc_professor" value="{{isset($video)?$video->vc_professor:''}}"
            placeholder="Insira o nome do professor" required autofocus>
    </div>





