<div class="btn-group">
    <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right table-responsive">
        @if ( Auth::User()->vc_tipoUtilizador != 'Supervisor' )
        <a class="dropdown-item small"
            href="{{ route('admin/anolectivo/editar', $id) }}">Editar </a>
    
        <a href="{{ route('admin/anolectivo/eliminar', $id) }}"
            class="dropdown-item small"
            data-confirm="Tem certeza que deseja eliminar?">Eliminar </a>
            @endif
    </div>
</div>

