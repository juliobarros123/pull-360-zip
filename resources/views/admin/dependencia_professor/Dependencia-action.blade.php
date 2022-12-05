<td>
    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-blue d-block mx-auto dropdown-toggle"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
        <div class="dropdown-menu dropdown-menu-right table-responsive">
            @if ( Auth::User()->vc_tipoUtilizador != 'Supervisor' )
            <a class="dropdown-item small"
                href="{{ route('dependencias.professor.editar',  $id ) }}">Editar </a>
       
            <a href="{{ route('dependencias.professor.eliminar',  $id ) }}"
                class="dropdown-item small eliminar"
                data-confirm="Tem certeza que deseja eliminar?" >Eliminar </a>
                {{-- <a 
                class="dropdown-item small eliminar"
                idCand="{{$id}}" >Transferir </a> --}}
                @endif
        </div>
    </div>
</td>

