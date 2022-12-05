<div class="text-center">
    <p>
    <img src="images/insignia/logo_old.png" width="100" height="100"><br>
		{{$cabecalho->vc_republica}}<br>
        {{$cabecalho->vc_ministerio}}<br>
        </p>
</div>

<h3><div class="text-center">RELATÓRIO DA QUANTIDADE  DE ALUNOS POR MUNICÍPIO</div></h3>

    
<table id="example" class="display table table-hover table-bordered ">
<thead class="thead-dark">
            <tr class="text-center">
                <!-- <th width="1px">Nº</th> -->
                <th class="text-center">MUNICÍPIO</th>
                <th class="text-center">TOTAL DE ALUNOS</th>
                <th class="text-center">ANO LECTIVO</th>
                </tr>
        </thead>
        <tbody class="bg-white text-center">

            <!--  $contador = 1; 
             foreach ($totalGeral as $totalGeral) : -->

             <tbody class="bg-white text-center">
        @foreach ($totalGeral as $totalGeral)
                <tr>
                    <!-- <td> echo $contador++;</td> -->
                    <td class="text-center">{{$totalGeral->m}}</td>
                    <td class="text-center">{{$totalGeral->total}}</td>
                    <td class="text-center">@if($data=='Todos')
                                                {{$data}} 
                                            @else
                                            {{$totalGeral2->ya_inicio}}-{{$totalGeral2->ya_fim}}
                                            @endif                   
                    </td>
                </tr>

                @endforeach
                </tbody>
    </table>


{{--<h5><div class="text-left">MUNICÍPIO(s): {{$it_id_municipio ? : ''}}</div></h5>
<h5><div class="text-left">ANO LECTIVO: {{$it_id_anoLectivoLista ? : ''}}</div></h5> -->
 $data1 ? : ''
$data $totalGeral2->ya_inicio.' - '.$totalGeral2->ya_fim --}}

<h5><div class="text-left">MUNICÍPIO(s): {{$data1 ? : ''}}</div></h5>
{{--<h5><div class="text-left">ANO LECTIVO: {{$totalGeral2->ya_inicio ? : ''}}</div></h5> --}}


