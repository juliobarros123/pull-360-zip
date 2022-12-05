<div class="btn-group">
    <button type="button"
        class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right">
        @if ( Auth::User()->vc_tipoUtilizador != 'Supervisor' )
        <a class="dropdown-item small"
        data-confirm="Tem certeza que deseja eliminar?" href="{{ route('pais.excluir', $id) }}"
        class="dropdown-item">Eliminar</a>
        @endif

    </div>
</div>
