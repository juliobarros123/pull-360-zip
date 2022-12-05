
        <div class="form-group col-md-4 ">
            <label class="bold" for="vc_tarefa">{{ __('Título*') }}</label>
            <input value="{{ isset($tarefa->vc_tarefa) ? $tarefa->vc_tarefa : '' }}" id="vc_tarefa" type="text"
                class="form-control bg-white rounded-pill @error('vc_tarefa') is-invalid @enderror" name="vc_tarefa"
                placeholder="Nome da tarefa" value="{{ old('vc_tarefa') }}" required autocomplete="vc_tarefa"
                autofocus>

            @error('vc_tarefa')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>



        <div class="form-group col-md-4  ">
            <label class="bold" for="id_classe_disciplinas">{{ __('Selecciona a classe e a disciplina*') }}</label>
            <select class="form-control bg-white rounded-pill select2" name="id_classe_disciplinas" id="id_classe_disciplinas" required>

                @if (isset($classeDisciplina['0']))
                    <option value="{{ $classeDisciplina['0']->id_c_d }}" selected disabled>
                        {{ $classeDisciplina['0']->vc_classe }}ª Classe|{{ $classeDisciplina['0']->vc_disciplina }}
                    </option>
                @else
                    <option value="" selected disabled>Classe e disciplina</option>
                @endif

                @foreach ($classesDisciplinas as $classeDisciplina)

                    <option value="{{ $classeDisciplina->id_c_d }}">{{ $classeDisciplina->vc_classe }}ª
                        Classe|{{ $classeDisciplina->vc_disciplina }} </option>



                @endforeach
                </option>


            </select>

        </div>


        <div class="form-group col-md-4 ">
            <label class="bold" for="dt_data_entrega">{{ __('Data de entrega*') }}</label>
            <input value="{{ isset($tarefa->dt_data_entrega) ? $tarefa->dt_data_entrega : '' }}" id="dt_data_entrega"
                type="date" class="form-control bg-white rounded-pill @error('dt_data_entrega') is-invalid @enderror" name="dt_data_entrega"
                required autocomplete="dt_data_entrega" min="{{ date('Y-m-d') }}" autofocus>

            @error('dt_data_entrega')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="form-group col-md-6 ">
            <label class="bold">Selecciona o pdf*</label>
        
            <input value="" type="file" class="form-control bg-white rounded-pill" name="vc_pdf" size="50MB image/*"
                placeholder="pdf" autofocus>
        </div>
        <div class="form-group col-md-6 ">
            <label class="bold">Selecciona a imagem*</label>
        
            <input value="" type="file" class="form-control bg-white rounded-pill" name="vc_img" size="50MB image/*"
                placeholder="pdf" autofocus>
        </div>
    <div class="form-group col-md-12">
        <label class="bold" for="vc_descricao">{{ __('Descrição*') }}</label>
        <textarea id="vc_descricao" name="vc_descricao" style="border-radius: 1rem!important;" rows="4" cols="50" class="form-control bg-white rounded-pill">

            @if (isset($tarefa->vc_descricao))
            {{ $tarefa->vc_descricao }}
            @endif
           
          
            </textarea>
    </div>
 
