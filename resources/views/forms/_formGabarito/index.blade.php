

        <div class="form-group col-md-6 ">
            <label class="bold">Selecciona o Gabarito*</label>

            <input value="" type="file" class="form-control bg-white rounded-pill" name="vc_gabarito" size="50MB image/*"
                placeholder="pdf" autofocus>
        </div>
    

         <div class="form-group col-md-6">
             <label class="bold">Descrição do aquivo*</label>
             <textarea type="text" value="" class="form-control bg-white rounded-pill" name="vc_descricao_gabarito" placeholder="Descrição do PDF">{{isset($gabarito)? $gabarito->vc_descricao_gabarito : ''}}</textarea>
         </div>
{{-- <div class="col-md-6">
     <div class="form-group ">
         <label>Titulo do arquivo</label>
         <textarea type="text" value="" class="form-control" name="vc_title" placeholder="Titulo do PDF">{{isset($PDF)?$PDF->vc_descricao_pdf:''}}</textarea>
    </div>
</div>

 --}}
