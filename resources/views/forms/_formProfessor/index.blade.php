<div class="col-12">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="bold" for="year">{{ __('Professor*') }}</label>
                <select class="form-control bg-white rounded-pill" name="it_id_utilizador" id="it_id_utilizador" >
                    @isset(  $professorEscola)
                    <option value="{{$professorEscola['0']->it_id_utilizador}}" selected  >{{ $professorEscola['0']->vc_primemiroNome . ' ' . $professorEscola['0']->vc_apelido }}</option>
                    @endisset     
                @isset(  $professor)
                <option value="{{$professor->id}}"  >{{ $professor->vc_primemiroNome . ' ' . $professor->vc_apelido }}</option>
                @endisset   
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="bold" for="gradesubject">{{ __('Escola*') }}</label>
                <select class="form-control bg-white rounded-pill" name="it_id_escola" id="it_id_escola" >
                    @isset(  $professorEscola)
                    <option value="{{$professorEscola['0']->it_id_escola}}" selected  >{{ $professorEscola['0']->vc_escola}}</option>
                    @endisset 
                @foreach ($escolas as $escola)
            <option value="{{$escola->id}}" >{{$escola->vc_escola}}</option>
                 @endforeach
        
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="bold" for="theme">{{ __('Seleciona a Classe| Disciplina*') }}</label>
                <select class="form-control bg-white rounded-pill" name="it_id_classedisciplina" id="id_classe_disciplinas" required>
    
                    @if (isset($professorEscola))
                    <option value="{{$professorEscola['0']->it_id_classedisciplina}}" selected disabled>{{$professorEscola['0']->vc_classe}}ª Classe|{{ $professorEscola['0']->vc_disciplina }} </option>
                    @else
                   <option value="" selected disabled>Seleciona a Classe| Disciplina</option>
                   @endif
                
                    @foreach ($classesDisciplinas as $classeDisciplina)
    
                    <option value="{{$classeDisciplina->id_c_d}}">{{$classeDisciplina->vc_classe}}ª Classe|{{ $classeDisciplina->vc_disciplina }} </option>
        
               
                   
                @endforeach
         
                     
                
                </select>
            </div>
        </div>
    </div>
</div>