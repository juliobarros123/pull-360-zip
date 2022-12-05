<div class="btn-group">
    <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right">
        @if (Auth::User()->vc_tipoUtilizador != 'Supervisor')
            <a href="{{ route('filhos.editar', $id) }}" class="dropdown-item small">Editar</a>
            <a href="{{ route('admin.users.editar.passe', $id) }}" class="dropdown-item small text-muted"
                type="button">Editar palavra-passe</a>
            <a href="{{ route('encarregado.verMateria', $id) }}" class="dropdown-item small">Ver matéria</a>


            <a href="{{ route('encarregado.verTarefa', $id) }}" class="dropdown-item small">Ver Tarefa</a>
            <a class="dropdown-item small" href="{{ route('admin.users.excluir', $id) }}"
                data-confirm="Tem certeza que deseja eliminar?">Eliminar</a>

            <a class="dropdown-item small" data-toggle="modal"
                data-target="#exampleModal{{ $id }}">Acessos</a>


           
            <a href="{{ route('matricula.edit', $id_matricula) }}" class="dropdown-item small">Editar dados
                académicos</a>
        @endif

    </div>
</div>

<div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModal{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header  d-flex justify-content-center">
                <h5 class="modal-title " id="exampleModalLabel">Tempos de acesso na plataforma</h5>
                
            </div>
            <div class="modal-body">

           
                   
                        @foreach (logs_acesso($id) as $item)
                        
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                   Acesso em: 
                                  <span class="badge badge-primary badge-pill display-2">
                                      {{  date('d-m-Y  H:i:s', strtotime($item->created_at)) }}
                                    
                                    </span>
                                </li>
                                
                              </ul>
                        @endforeach
               

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Fechar</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
