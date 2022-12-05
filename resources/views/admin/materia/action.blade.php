<div class="btn-group">
    <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        id="myDropdown"></button>
    <div class="dropdown-menu dropdown-menu-right table-responsive">
        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
            {{-- @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Professor') --}}
            <a href="{{ route('materia.editar', $id_m) }}"
                class="dropdown-item small">Editar</a>

            <a href="{{ route('materia.addvideo', ['id' => $id_m]) }}"
                class="dropdown-item small">Adicionar VIDEO</a>
        
        @endif

        <a href="{{ route('materia.supervisionar', ['id' => $id_m]) }}"
            class="dropdown-item small">Supervisionar</a>


        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
            {{-- @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Professor') --}}
            <a href="{{ route('materia.excluir', $id) }}"
                class="dropdown-item small"
                data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
        @endif
        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
            {{-- @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor' || Auth::User()->vc_tipoUtilizador == 'Professor') --}}
            <a href="{{ route('materia.adicionar_video_youtube_listar', $id) }}"
                class="dropdown-item small">Ver Vídeos do youtube </a>
        @endif

        @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
            <a href="{{ route('materia.adicionar_video_youtube', $id) }}"
                class="dropdown-item small">Adicionar Vídeos do youtube</a>
        @endif
    </div>
</div>