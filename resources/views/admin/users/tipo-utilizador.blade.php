@if ( Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
<select id="{{ $id }}" name="utilizador" class="form-control border-0 selectTipoUtilizador"
    required>
    <option value="">{{ $vc_tipoUtilizador=='Gestor_conteudo'?'Gestor de conteúdo':$vc_tipoUtilizador }}</option>
    <option value="Administrador">Administrador</option>
    <option value="Professor">Professor</option>
    <option value="Encarregado">Encarregado</option>
    <option value="Aluno">Aluno</option>
    <option value=" Filho">  Filho</option>
    <option  value="Diretor Municipal"> Diretor Municipal</option>
    <option  value="Gestor_conteudo"> Gestor de conteúdo</option>
    <option value="Supervisor">Supervisor
    </option>
    <option value="Chefe departamento provincial">Chefe departamento provincial</option>
    @if (Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
        <option value="Desenvolvedor">Desenvolvedor</option>
    @endif

</select>
@else
   {{ $vc_tipoUtilizador }}
@endif
