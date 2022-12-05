



<div class="text-center">
    <p>
    <img src="images/insignia/logo_old.png" width="100" height="100"><br>
		{{$cabecalho->vc_republica}}<br>
        {{$cabecalho->vc_ministerio}}<br>
        </p>
</div>
        <h3><div class="text-center">RELTÓRIO DA QUANTIDADE DE ALUNOS POR ESCOLA</div></h3>
       

        <table id="example" class="display table table-hover table-bordered ">
        <thead class="thead-dark">
            <tr class="text-center">
                <th class="text-center">ESCOLA</th>
                <th class="text-center">QUANTIDADE DE ALUNOS</th>         
            </tr>
        </thead>
        <tbody class="bg-white text-center">
        @foreach ($escolas as $escola)
                 <tr class="text-center">
                
                        <td class="text-center">{{$escola->vc_escola}}</td>    
                        <td class="text-center">{{$escola->quantidade}}</td>                     
                </tr>
                
                @endforeach
                <tr class="text-center">
                        <td class="text-center">Não matriculados</td>    
                        <td class="text-center">{{$nao_matriculados}}</td> 
                </tr>
        </tbody>
    </table>
    
    <h5><div class="text-left">ESCOLA: {{$it_id_escolaLista}}</div></h5>
    <h5><div class="text-left">ANO LECTIVO: {{$it_id_anoLectivoLista}}</div></h5>
