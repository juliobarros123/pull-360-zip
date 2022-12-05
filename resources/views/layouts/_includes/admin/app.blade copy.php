<!DOCTYPE html>
<html lang="pt">

@include('layouts._includes.admin.head')

<body>
    <div id="appication" class="dashboard min-vh-100">
        <div class="admin">
            <header class="dash-header">
                @include('layouts._includes.admin.nav')
            </header>
            @if (Auth::User()->vc_tipoUtilizador == 'Supervisor' )
            @include('layouts._includes.admin.aside-supervisor')
            @else
            @include('layouts._includes.admin.aside')
@endif
            @yield('conteudo')
        </div>
    </div>
    <style>
        .bold {
            font-size: 12px !important;
            font-weight: 600 !important;
            margin-bottom: 0.3rem !important;
        }

    </style>

    @if (Auth::User()->vc_tipoUtilizador == 'Administrador' || Auth::User()->vc_tipoUtilizador == 'Supervisor'  || Auth::User()->vc_tipoUtilizador == 'Desenvolvedor')
        <script>
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'data_grafigos',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: true,
                data: '',
                success: function(response) {
                    //Start admin
                    ttl_alunos = response.ttl_alunos;
                    provincias = response.provincias;
                    alunos = response.alunos;
                    classes = response.classes_grafico;
                    alunos_por_classes = response.alunos_grafico;
                    console.log(alunos_por_classes);
                    console.log(classes);
                    const alunosProvinciaCanva = document.getElementById('alunosProvincia')
                    const alunosProvinciaCtx = alunosProvinciaCanva.getContext('2d');
                    const alunosProvincia = new Chart(alunosProvinciaCtx, {
                        type: 'doughnut',
                        data: {
                            labels: provincias,
                            datasets: [{
                                label: 'Alunos por Provincias',

                                data: alunos,
                                backgroundColor: [
                                    '#FF6633', '#FFB399', '#FF33FF', '#FFFF99',
                                    '#E6B333', '#3366E6', '#999966', '#00B3E6',
                                    '#99FF99', '#80B300', '#809900', '#E6B3B3',
                                    '#FF99E6', '#CCFF1A', '#FF1A66', '#33FFCC',
                                    '#66994D', '#B366CC', '#4D8000', '#CC80CC',
                                    '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
                                    '#E666B3', '#33991A', '#CC9999', '#00E680',
                                    '#4D8066', '#809980', '#E6FF80', '#6680B3',
                                    '#FF3380', '#66E64D', '#4D80CC', '#9900B3',
                                    '#E64D66', '#4DB380', '#99E6E6', '#6666FF'

                                ],
                                hoverOffset: 0,
                                borderWidth: 0,
                                weight: 30,
                                pointBorderColor: 'red'
                            }],

                        },
                        options: {
                            //cutout: 55,
                            //responsive: false,
                            //aspectRatio: 1,
                            maintainAspectRatio: false,
                            plugins: {

                                /* title: {
                                                     display: false,
                                                     align: 'center',
                                                     text: '230.900 Alunos',
                                                     //position: 'center',
                                                     verticalAlign: 'middle',
                                                     fontSize: 14,
                                 
                                                     fontColor: '#474747',
                                                 },*/

                                elements: {
                                    center: {
                                        // the longest text that could appear in the center
                                        maxText: '$000000',
                                        text: ttl_alunos,
                                        fontColor: 'black',
                                        fontFamily: "'Arial'",
                                        //fontStyle: 'normal',
                                        minFontSize: 1,
                                        maxFontSize: 256,
                                    }
                                },
                                legend: {
                                    display: false,
                                    position: 'right',
                                    align: "center",
                                    borderWidth: 1,
                                    borderColor: '#999999',
                                    labels: {
                                        //boxWidth: 10,
                                        //fontColor: '#000',
                                        //fontSize: 10,
                                        usePointStyle: true,

                                        padding: 25

                                        //pointStyle: 'crossRot'

                                    }
                                }
                            },

                        },
                        plugins: [{
                                beforeInit: (c) => {

                                    let labelContainer = document.getElementById(
                                        'alunosProvinciaLabels')
                                    c.config.data.labels.forEach((element, idx) => {
                                        let dataset = c.config.data.datasets[0]
                                        let color = dataset.backgroundColor[idx]
                                        let data = dataset.data[idx]
                                        labelContainer.innerHTML += `
                            <div class="d-flex flex-wrap small mb-1 mb-md-3">
                                <div class="col-6 small px-1 d-flex align-items-center">
                                    <span class="circle mr-1" style="display: inline-block; height: 10px; width: 10px; border-radius: 50px; border: 3px solid #fff; border-color: ${color}"></span>
                                    <span class="font-weight-bold">${element}</span>
                                </div>
                                <div class="col-6 small px-1">
                                    <span class="text-muted"> ${data} Alunos</span>
                                </div>
                            </div>
                            `

                                    });

                                },
                            },
                            {


                                beforeDraw: function(chart) {

                                    if (chart.config.options.plugins.elements?.center) {
                                        // Get ctx from string

                                        var ctx = chart.ctx;

                                        // Get options from the center object in options
                                        var centerConfig = chart.config.options.plugins.elements
                                            .center;
                                        var fontStyle = centerConfig.fontStyle || 'Arial';
                                        var txt = centerConfig.text;
                                        var color = centerConfig.color || '#000';
                                        var maxFontSize = centerConfig.maxFontSize || 75;
                                        var sidePadding = centerConfig.sidePadding || 20;
                                        var sidePaddingCalculated = (sidePadding / 100) * (chart
                                            .innerRadius * 2)
                                        // Start with a base font of 30px
                                        ctx.font = "30px " + fontStyle;

                                        // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
                                        var stringWidth = ctx.measureText(txt).width;
                                        var elementWidth = (chart.innerRadius * 2) -
                                            sidePaddingCalculated;

                                        // Find out how much the font can grow in width.
                                        var widthRatio = elementWidth / stringWidth;
                                        var newFontSize = Math.floor(30 * widthRatio);
                                        var elementHeight = (chart.innerRadius * 2);

                                        // Pick a new font size so it will not be larger than the height of label.
                                        var fontSizeToUse = Math.min(newFontSize, elementHeight,
                                            maxFontSize);
                                        var minFontSize = centerConfig.minFontSize;
                                        var lineHeight = centerConfig.lineHeight || 25;
                                        var wrapText = false;

                                        if (minFontSize === undefined) {
                                            minFontSize = 20;
                                        }

                                        if (minFontSize && fontSizeToUse < minFontSize) {
                                            fontSizeToUse = minFontSize;
                                            wrapText = true;
                                        }

                                        // Set font settings to draw it correctly.
                                        ctx.textAlign = 'center';
                                        ctx.textBaseline = 'middle';
                                        var centerX = ((chart.chartArea.left + chart.chartArea
                                            .right) / 2);
                                        var centerY = ((chart.chartArea.top + chart.chartArea
                                            .bottom) / 2);
                                        //ctx.font = fontSizeToUse + "px " + fontStyle;
                                        ctx.font = 12 + "px " + fontStyle;
                                        ctx.fillStyle = color;

                                        if (!wrapText) {
                                            ctx.fillText(txt, centerX, centerY);
                                            return;
                                        }

                                        var words = txt.split(' ');
                                        var line = '';
                                        var lines = [];

                                        // Break words up into multiple lines if necessary
                                        for (var n = 0; n < words.length; n++) {
                                            var testLine = line + words[n] + ' ';
                                            var metrics = ctx.measureText(testLine);
                                            var testWidth = metrics.width;
                                            if (testWidth > elementWidth && n > 0) {
                                                lines.push(line);
                                                line = words[n] + ' ';
                                            } else {
                                                line = testLine;
                                            }
                                        }

                                        // Move the center up depending on line height and number of lines
                                        centerY -= (lines.length / 2) * lineHeight;

                                        for (var n = 0; n < lines.length; n++) {
                                            ctx.fillText(lines[n], centerX, centerY);
                                            centerY += lineHeight;
                                        }
                                        //Draw text in center
                                        ctx.fillText(line, centerX, centerY);
                                    }
                                }
                            },
                        ]
                    });

                    const alunosClasseCanva = document.getElementById('alunosClasse');
                    const alunosClasseCtx = alunosClasseCanva.getContext('2d');
                    const alunosClasse = new Chart(alunosClasseCtx, {
                        type: 'bar',
                        data: {
                            labels: classes,
                            datasets: [{
                                label: 'Alunos por classe',
                                data: alunos_por_classes,
                                backgroundColor: [
                                    '#A3A1FB',
                                    '#A3A1FB',
                                    '#A3A1FB',
                                    '#A3A1FB',
                                    '#A3A1FB',
                                ],
                                borderRadius: 5,
                                hoverOffset: 0,
                                borderWidth: 0
                            }],

                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: false

                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: false
                                },
                                x: {
                                    grid: {
                                        display: false
                                    }
                                }
                            }
                           

                        }
                    });

                    // End admin

                }
            });
        </script>
    @endif


    @if (Auth::User()->vc_tipoUtilizador == 'Gestor_conteudo')
        <script>
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'data_grafigo_gestor',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: true,
                data: '',
                success: function(response) {
                    console.log(response);
                    // Start admin

                    disciplinas = response.disciplinas;
                    materias = response.materias;
                    ttl_materias = response.ttl_materias;
                    const alunosProvinciaCanva = document.getElementById('alunosProvincia')
                    const alunosProvinciaCtx = alunosProvinciaCanva.getContext('2d');
                    const alunosProvincia = new Chart(alunosProvinciaCtx, {
                        type: 'doughnut',
                        data: {
                            labels: disciplinas,
                            datasets: [{
                                label: 'Alunos por Províncias',

                                data: materias,
                                backgroundColor: [
                                    '#FF6633', '#FFB399', '#FF33FF', '#FFFF99',
                                    '#E6B333', '#3366E6', '#999966', '#00B3E6',
                                    '#99FF99', '#80B300', '#809900', '#E6B3B3',
                                    '#FF99E6', '#CCFF1A', '#FF1A66', '#33FFCC',
                                    '#66994D', '#B366CC', '#4D8000', '#CC80CC',
                                    '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
                                    '#E666B3', '#33991A', '#CC9999', '#00E680',
                                    '#4D8066', '#809980', '#E6FF80', '#6680B3',
                                    '#FF3380', '#66E64D', '#4D80CC', '#9900B3',
                                    '#E64D66', '#4DB380', '#99E6E6', '#6666FF'

                                ],
                                hoverOffset: 0,
                                borderWidth: 0,
                                weight: 30,
                                pointBorderColor: 'red'
                            }],

                        },
                        options: {
                            //cutout: 55,
                            //responsive: false,
                            //aspectRatio: 1,
                            maintainAspectRatio: false,
                            plugins: {

                                /* title: {
                                                     display: false,
                                                     align: 'center',
                                                     text: '230.900 Alunos',
                                                     //position: 'center',
                                                     verticalAlign: 'middle',
                                                     fontSize: 14,
                                 
                                                     fontColor: '#474747',
                                                 },*/

                                elements: {
                                    center: {
                                        // the longest text that could appear in the center
                                        maxText: '$000000',
                                        text: ttl_materias,
                                        fontColor: 'black',
                                        fontFamily: "'Arial'",
                                        //fontStyle: 'normal',
                                        minFontSize: 1,
                                        maxFontSize: 256,
                                    }
                                },
                                legend: {
                                    display: false,
                                    position: 'right',
                                    align: "center",
                                    borderWidth: 1,
                                    borderColor: '#999999',
                                    labels: {
                                        //boxWidth: 10,
                                        //fontColor: '#000',
                                        //fontSize: 10,
                                        usePointStyle: true,

                                        padding: 25

                                        //pointStyle: 'crossRot'

                                    }
                                }
                            },

                        },
                        plugins: [{
                                beforeInit: (c) => {

                                    let labelContainer = document.getElementById(
                                        'alunosProvinciaLabels')
                                    c.config.data.labels.forEach((element, idx) => {
                                        let dataset = c.config.data.datasets[0]
                                        let color = dataset.backgroundColor[idx]
                                        let data = dataset.data[idx]
                                        labelContainer.innerHTML += `
                            <div class="d-flex flex-wrap small mb-1 mb-md-3">
                                <div class="col-6 small px-1 d-flex align-items-center">
                                    <span class="circle mr-1" style="display: inline-block; height: 10px; width: 10px; border-radius: 50px; border: 3px solid #fff; border-color: ${color}"></span>
                                    <span class="font-weight-bold">${element}</span>
                                </div>
                                <div class="col-6 small px-1">
                                    <span class="text-muted"> ${data} matérias</span>
                                </div>
                            </div>
                            `

                                    });

                                },
                            },
                            {


                                beforeDraw: function(chart) {

                                    if (chart.config.options.plugins.elements?.center) {
                                        // Get ctx from string

                                        var ctx = chart.ctx;

                                        // Get options from the center object in options
                                        var centerConfig = chart.config.options.plugins.elements
                                            .center;
                                        var fontStyle = centerConfig.fontStyle || 'Arial';
                                        var txt = centerConfig.text;
                                        var color = centerConfig.color || '#000';
                                        var maxFontSize = centerConfig.maxFontSize || 75;
                                        var sidePadding = centerConfig.sidePadding || 20;
                                        var sidePaddingCalculated = (sidePadding / 100) * (chart
                                            .innerRadius * 2)
                                        // Start with a base font of 30px
                                        ctx.font = "30px " + fontStyle;

                                        // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
                                        var stringWidth = ctx.measureText(txt).width;
                                        var elementWidth = (chart.innerRadius * 2) -
                                            sidePaddingCalculated;

                                        // Find out how much the font can grow in width.
                                        var widthRatio = elementWidth / stringWidth;
                                        var newFontSize = Math.floor(30 * widthRatio);
                                        var elementHeight = (chart.innerRadius * 2);

                                        // Pick a new font size so it will not be larger than the height of label.
                                        var fontSizeToUse = Math.min(newFontSize, elementHeight,
                                            maxFontSize);
                                        var minFontSize = centerConfig.minFontSize;
                                        var lineHeight = centerConfig.lineHeight || 25;
                                        var wrapText = false;

                                        if (minFontSize === undefined) {
                                            minFontSize = 20;
                                        }

                                        if (minFontSize && fontSizeToUse < minFontSize) {
                                            fontSizeToUse = minFontSize;
                                            wrapText = true;
                                        }

                                        // Set font settings to draw it correctly.
                                        ctx.textAlign = 'center';
                                        ctx.textBaseline = 'middle';
                                        var centerX = ((chart.chartArea.left + chart.chartArea
                                            .right) / 2);
                                        var centerY = ((chart.chartArea.top + chart.chartArea
                                            .bottom) / 2);
                                        //ctx.font = fontSizeToUse + "px " + fontStyle;
                                        ctx.font = 12 + "px " + fontStyle;
                                        ctx.fillStyle = color;

                                        if (!wrapText) {
                                            ctx.fillText(txt, centerX, centerY);
                                            return;
                                        }

                                        var words = txt.split(' ');
                                        var line = '';
                                        var lines = [];

                                        // Break words up into multiple lines if necessary
                                        for (var n = 0; n < words.length; n++) {
                                            var testLine = line + words[n] + ' ';
                                            var metrics = ctx.measureText(testLine);
                                            var testWidth = metrics.width;
                                            if (testWidth > elementWidth && n > 0) {
                                                lines.push(line);
                                                line = words[n] + ' ';
                                            } else {
                                                line = testLine;
                                            }
                                        }

                                        // Move the center up depending on line height and number of lines
                                        centerY -= (lines.length / 2) * lineHeight;

                                        for (var n = 0; n < lines.length; n++) {
                                            ctx.fillText(lines[n], centerX, centerY);
                                            centerY += lineHeight;
                                        }
                                        //Draw text in center
                                        ctx.fillText(line, centerX, centerY);
                                    }
                                }
                            },
                        ]
                    });








                    classes_grafico = response.classes_grafico;
                    materias_classes_grafico = response.materias_classes_grafico;
                    const alunosClasseCanva = document.getElementById('alunosClasse');
                    const alunosClasseCtx = alunosClasseCanva.getContext('2d');
                    const alunosClasse = new Chart(alunosClasseCtx, {
                        type: 'bar',
                        data: {
                            labels: classes_grafico,
                            datasets: [{
                                label: 'Matérias por classe',
                                data: materias_classes_grafico,
                                backgroundColor: [
                                    '#A3A1FB',
                                    '#A3A1FB',
                                    '#A3A1FB',
                                    '#A3A1FB',
                                    '#A3A1FB',
                                ],
                                borderRadius: 5,
                                hoverOffset: 0,
                                borderWidth: 0
                            }],

                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: false

                                }
                            },
                            scales: {
                                y: {
                                    //beginAtZero: false
                                },
                                x: {
                                    grid: {
                                        display: false
                                    }
                                }
                            }

                        }
                    });






                }
            });
        </script>
    @endif

    <script>
        // var estado = 1;


        $('#password').on('keyup', function(event) {

            var senha = $("#password").val();

            var pathname = $(location).attr('pathname');

            var elemento = document.getElementById("label-senha");

            if (senha.length > 0 && senha.length <= 7 && pathname != '/login') {

                elemento.innerHTML =
                    "A Senha deve conter mais de 7 carácter es composto por números e carácter es especiais";
                elemento.style.color = "red";
                // Swal.fire(
                //     'Atenção',
                //     'A palavra passe deve conter mais de 7 carácter es composto por números e carácter es especiais',
                //     'info'
                // );
                estado = 0;
            } else if (senha.length == 0) {
                elemento.innerHTML = "Senha*";
                elemento.style.color = "black";
            }
            if (senha.length > 7) {
                elemento.innerHTML = "Senha aceitável";
                elemento.style.color = "green";
            }

        });
    </script>


    <script>
        function containsSpecialChars(str) {
            const espaco_e_carac_especial = /[^a-zA-Z0-9]/g;

            return espaco_e_carac_especial.test(str);
        }

        let jjk = false;
        var verdadeiro = true;
        var falso = false;
        $('#vc_nomeUtilizador').on('keyup', function() {
            let user = $("#vc_nomeUtilizador").val();
            console.log("o");
            let pathname = $(location).attr('pathname');
            // console.log('kl' + user);
            let elemento = document.getElementById("label-usuario");
            let jjk = containsSpecialChars(user);
            console.log(user);

            //     var dados = $('form').serialize();

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/encarregado/buscar-usuario/' + user,
                async: true
                    // , data: dados
                    ,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    // console.log('aaa' + response.user)

                    let texto =
                        'nome de usuário não deve conter espaço em branco, acento ou carácter  especial';
                    if (response.user != '') {
                        jjk = true;
                        texto = 'nome de usuário existente';

                    } else {
                        elemento.innerHTML = 'Nome de usuário*';
                    }
                    if (jjk == true) {
                        // document.getElementById("termo").disabled = true;

                    } else {
                        // document.getElementById("termo").disabled = false;

                    }
                    // console.log('teste' + jjk);
                    jjk === true ? [elemento.style.color = "red"] : elemento.style.color = "black"
                    jjk === true ? elemento.innerHTML =
                        texto : elemento.style.color = "black"

                }


            });



        });
    </script>


    <script src="/js/sweetalert2.all.min.js"></script>
    @if (session('acao_nao_autorizado'))
        <script>
            Swal.fire(
                'Você não tem autorização para realizar esta ação!',
                '',
                'error'
            )
        </script>
    @endif


    @if (session('cadastrado_geral'))
        <script>
            Swal.fire(
                'Dados cadastrado com sucesso',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('actualizado_geral'))
        <script>
            Swal.fire(
                'Dados actualizado com sucesso',
                '',
                'success'
            )
        </script>
    @endif
    @if (session('eliminado_geral'))
        <script>
            Swal.fire(
                'Dados eliminado com sucesso',
                '',
                'success'
            )
        </script>
    @endif


    @if (session('status_demo'))
        <script>
            Swal.fire(
                'Cadastro finalizado com sucesso!',
                '',
                'success'
            )
        </script>
    @endif


    @include('layouts._includes.admin.data_nascimento.validacao')

    <script src="/site/vendor/popper/popper.min.js"></script>
    <script src="/site/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/site/assets/js/all.js"></script>

    @include('layouts._includes.admin.datatables.js')

    <script >

  
        $(document).ready(function() {
            $('.select2').select2(
                // width: 'resolve'
            );
        });
    </script>

    <script>
        $(document).ready(function() {
               $('#dataTable').DataTable({
                 "draw": 1,
                "recordsTotal": 57,
                "recordsFiltered": 57,
                "dom": '<lf<"custom-table table-responsive radius-top-3"t>ip>',

                processing: true,

                processing: true,
                "draw": 1,
                "recordsTotal": 57,
                "recordsFiltered": 57
               
            });
            console.log($('#dataTable').DataTable())
        });
    </script>
    <style>
        .dataTables_paginate {
            display: flex;
        }
        .dataTables_paginate span {
            display: flex;
        }
        .fg-button {
            z-index: 3 !important;
            color: #fff !important;
            background-color: #3055A5 !important;
            border: none !important;
            box-shadow: 0px 3px 6px #00000055 !important;
            border-radius: 3px !important;
            padding: 0.5rem 0.75rem !important;
            font-size: 12px;
            display: block !important;
        }
        .fg-button.previous, .fg-button.next {
            background-color: transparent !important;
            color: #a2a3a3 !important;
            box-shadow: inherit !important;
        }

    </style>

{{-- <script>

    $(".not").click(function(){
      var notificacao=  $("#not");
      console.log(notificacao);
    });
</script> --}}
<script>
    $(document).on('click', 'a', function() {

        
        // var verClass = this.getAtr;
        // console.log(verClass);
        // var indice = (this.id).split('-')[1];

        // if (!($("#mais-" + indice).is(":visible"))) {
        //     $("#mais-" + indice).show();

        //     $("#" + verID).html("Ver menos");
        // } else {
        //     console.log("ola");
        //     $("#mais-" + indice).hide();
        //     $("#" + verID).html("Ver mais");
        // }

    });
</script>
{{-- <script>
    
    
    $("td")[0].innerHTML ('ola');
</script> --}}
<script src="/js/verMaisVerMenos.js"></script>

</body>
