<div class="btn-group">
    <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right table-responsive">
        @if ( Auth::User()->vc_tipoUtilizador != 'Supervisor' )
        <a href="{{ route('escolas.editar', $id) }}"
            class="dropdown-item small">Editar</a>
        <a href="{{ route('escolas.eliminar', $id) }}" class="dropdown-item small"
            data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
            @endif
    </div>
</div>