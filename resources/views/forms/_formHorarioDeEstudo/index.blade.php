<div class="row">
    <div class="form-group col-md-6">
        <label class="bold">Selecciona o arquivo*</label>

        <input value="" type="file" class="form-control bg-white rounded-pill" name="vc_pdf" size="50MB image/*"
            placeholder="pdf" autofocus>
    </div>


    <div class="form-group col-md-6 ">
        <label for="id_horarios" class="bold">{{ __('Selecciona o ensino*') }}</label>
        <select class="form-control bg-white rounded-pill" name="vc_nivel" id="id_horarios">

            {{-- @foreach ($horarios as $horario) --}}
            <option value="Ensino Primario">
                Ensino Primario
            </option>

            <option value="Iº Ciclo do Secundario">
                Iº Ciclo do Secundario
            </option>
            {{-- @endforeach --}}


        </select>


    </div>





</div>
