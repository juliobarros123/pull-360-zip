@if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
<td>
    <div class="btn-group">
        <button type="button"
            class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
        <div class="dropdown-menu dropdown-menu-right table-responsive">
            <a href="{{ route('horarios.edit', $id_horarios) }}"
                class="dropdown-item small">Editar</a>
            <a href="{{ route('horarios.delete', $id_horarios) }}"
                class="dropdown-item small"
                data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
        </div>
    </div>
</td>
@endif