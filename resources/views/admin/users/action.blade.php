<div class="btn-group">
    <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right">
        @if ( Auth::User()->vc_tipoUtilizador != 'Supervisor' )
            

        <a class="dropdown-item small"  href="{{ route('admin.users.editar', $id) }}" >Editar</a>
        <a class="dropdown-item small"
         href="{{ route('admin.users.excluir', $id) }}" data-confirm="Tem certeza que deseja eliminar?" >Eliminar</a>
        {{-- <button class="dropdown-item small" type="button">Adicionar PDF</button>
        <button class="dropdown-item small" type="button">Supervisionar</button>
        <button class="dropdown-item small" type="button">Eliminar</button>
        <button class="dropdown-item small" type="button">Ver Vídeos do Youtube</button>
        <button class="dropdown-item small" type="button">Adicionar Vídeos do Youtube</button> --}}
        @endif
    </div>
</div>