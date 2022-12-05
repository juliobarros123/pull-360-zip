<div class="btn-group">
    <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right table-responsive">
        @if (Auth::User()->vc_tipoUtilizador != 'Supervisor')
            @if ($estado == 1)
                <a href="{{ route('admin.comentarios.mudar_estado', ['slug' => $slug, 'estado' => 0]) }}"
                    class="dropdown-item small">Reprovar</a>
            @else
                <a href="{{ route('admin.comentarios.mudar_estado', ['slug' => $slug, 'estado' => 1]) }}"
                    class="dropdown-item small">Aprovar</a>
            @endif
        @endif
    </div>
</div>