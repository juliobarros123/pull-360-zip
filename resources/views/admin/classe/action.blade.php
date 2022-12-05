<div class="btn-group">
    <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right table-responsive">
        @if (Auth::User()->vc_tipoUtilizador != 'Supervisor')
            <a href="{{ route('classes.editar', $id_classe) }}" class="dropdown-item small">Editar</a>
            <a href="{{ route('classes.eliminar', $id_classe) }}" class="dropdown-item small"
                data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
            <a href="{{ route('classesDisciplinas.criar', $id_classe) }}" class="dropdown-item small">Vincular
                disciplina</a>
        @endif
        <a href="{{ route('classesDisciplinas.classeDisciplinas', $id_classe) }}"
            class="dropdown-item small">Disciplinas</a>

    </div>
</div>
