<div class="btn-group">
    <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right table-responsive">
        @if (Auth::User()->vc_tipoUtilizador== 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
            <a href="{{ route('tarefas.editar', $id_tarefa) }}"
                class="dropdown-item small">Editar</a>


            <a href="{{ route('tarefas.eliminar', $id_tarefa) }}"
                class="dropdown-item small"
                data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>
        @endif
        @if (Auth::User()->vc_tipoUtilizador== 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Professor')
            <a href="{{ route('tarefas.respostas', $id_tarefa) }}"
                class="dropdown-item small">Respostas</a>
        @endif
        @if (Auth::User()->vc_tipoUtilizador== 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Filho')
            <a href="{{ route('Tarefas_Submetidas.submeter', $id_tarefa) }}"
                class="dropdown-item small">Submeter</a>
        @endif
        @if (Auth::User()->vc_tipoUtilizador== 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo' || Auth::User()->vc_tipoUtilizador == 'Professor')
            <a href="{{ route('gabarito', $id_tarefa) }}"
                class="dropdown-item small">Ver Gabarito</a>
        @endif

        @if (Auth::User()->vc_tipoUtilizador == 'Filho')
            @if ($dt_data_entrega < date('Y-m-d'))
                <a href="{{ route('gabarito', $id_tarefa) }}"
                    class="dropdown-item small">Ver Gabarito</a>
            @endif
        @endif
        @if (Auth::User()->vc_tipoUtilizador== 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
            <a href="{{ route('gabarito.criar', $id_tarefa) }}"
                class="dropdown-item small">Enviar Gabarito</a>
        @endif
    </div>
</div>