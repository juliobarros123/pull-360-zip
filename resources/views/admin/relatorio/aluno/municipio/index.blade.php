<div class="text-center">
    <p>
        <img src="images/insignia/logo_old.png" width="100" height="100"><br>
        {{ $cabecalho->vc_republica }}<br>
        {{ $cabecalho->vc_ministerio }}<br>
    </p>
</div>
<h3>
    <div class="text-center">RELATÓRIO DO NÚMERO DE ALUNOS POR MUNICÍPIO  {{ isset($anoLectivo)?'NO ANO LECTIVO '.$anoLectivo->ya_inicio.'/'.$anoLectivo->ya_fim:'' }}</div>
</h3>


<table id="example" class="display table table-hover table-bordered ">
    <thead class="thead-dark">
        <tr class="text-center">
            <th class="text-center">MUNICÍPIO</th>
            <th class="text-center">MASCULINO</th>
            <th class="text-center">FEMININO</th>
        </tr>
    </thead>
    <tbody class="bg-white text-center">
        @foreach ($municipios as $municipio)
    
            <tr class="text-center">
                <td class="text-center">{{  $municipio->it_id_minicipio }}</td>
                <td class="text-center">
                    {{ $dados->where('it_id_minicipio',  $municipio->it_id_minicipio)->where('vc_genero', 'Masculino')->sum('quantidade') }}
                </td>
                <td class="text-center">{{ $dados->where('it_id_minicipio',  $municipio->it_id_minicipio)->where('vc_genero', 'Feminino')->count() }}</td>
            </tr>
        @endforeach
        <tr class="text-center">
            <td class="text-center">TOTAL</td>
            <td class="text-center">
                {{ $dados->where('vc_genero', 'Masculino')->sum('quantidade') }}
            </td>
            <td class="text-center">{{ $dados->where('vc_genero', 'Feminino')->count() }}</td>
        </tr>
        <tr class="text-center">
            <td class="text-center">TOTAL GERAL</td>
           
            <td class="text-center" colspan="2">{{ $dados->where('vc_genero', 'Feminino')->count()+$dados->where('vc_genero', 'Masculino')->sum('quantidade') }}</td>
        </tr>
    </tbody>
</table>
