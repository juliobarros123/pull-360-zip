



<div class="text-center">
    <p>
    <img src="images/insignia/logo_old.png" width="100" height="100"><br>
		{{$cabecalho->vc_republica}}<br>
        {{$cabecalho->vc_ministerio}}<br>
        </p>
</div>
        <h3><div class="text-center">RELTÓRIO DA QUANTIDADE DE ALUNOS POR PROVÍNCIA</div></h3>
       

        <table id="example" class="display table table-hover table-bordered ">
        <thead class="thead-dark">
            <tr class="text-center">
                <th class="text-center">PROVÍNCIA</th>
                <th class="text-center">QUANTIDADE DE ALUNOS</th>         
            </tr>
        </thead>
        <tbody class="bg-white text-center">
        @foreach ($provincias as $provincia)
                 <tr class="text-center">
                
                        <td class="text-center">{{$provincia->it_id_provincia}}</td>    
                        <td class="text-center">{{$provincia->quantidade}}</td>                     
                </tr>
                
                @endforeach
                <tr class="text-center">
                        <td class="text-center">TOTAL</td>    
                        <td class="text-center">{{$total}}</td> 
                </tr>
        </tbody>
    </table>
   