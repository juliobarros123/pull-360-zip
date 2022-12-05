<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="/site/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/site/vendor/slick/slick.css" />
    <link rel="stylesheet" href="/site/vendor/slick/slick-theme.css" />
    <link rel="stylesheet" href="site/assets/css/style.css" />
    <link rel="icon" href="/site/assets/img/icon.png" />
    <link href="/site/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
    <script src="/site/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/site/vendor/chart.js"></script>
    <script src="https://kit.fontawesome.com/a4f426abe5.js" crossorigin="anonymous"></script>
    <title>@yield('titulo')</title>
</head>

<body>
    <div id="appication" class="dashboard min-vh-100">
        <div class="admin">
            <header class="dash-header">
                @include('layouts._includes.admin.nav')
            </header>
            @include('layouts._includes.admin.aside')
            @yield('conteudo')
        
        </div>
    </div>


    <script>
        const alunosProvinciaCanva = document.getElementById('alunosProvincia')
        const alunosProvinciaCtx = alunosProvinciaCanva.getContext('2d');
        const alunosProvincia = new Chart(alunosProvinciaCtx, {
            type: 'doughnut',
            data: {
                labels: ['Escola Primaria', 'Escola Secundária', 'Privados', 'Outros'],
                datasets: [{
                    label: 'Alunos por Provincias',

                    data: [4260, 3970, 3454, 2390],
                    backgroundColor: [
                        '#55D8FE',
                        '#FF8373',
                        '#FFDA83',
                        '#A3A0FB'
                    ],
                    hoverOffset: 0,
                    borderWidth: 0,
                    weight: 30,
                    pointBorderColor: 'red'
                }],

            },
            options: {
                cutout: 130,
                //responsive: false,
                //aspectRatio: 1,
                //maintainAspectRatio: true,
                plugins: {

                    title: {
                        display: false,
                        align: 'center',
                        text: '230.900 Alunos',
                        position: 'center',
                        fontSize: 14,

                        fontColor: '#474747',
                    },
                    legend: {
                        position: 'right',
                        borderWidth: 1,
                        borderColor: '#999999',
                        labels: {
                            //boxWidth: 10,
                            //fontColor: '#000',
                            //fontSize: 10,
                            usePointStyle: true,
                            //pointStyle: 'crossRot'

                        }
                    }
                },

            },
            /* plugin: [{
                 id: 'my-doughnut-text-plugin',
                 afterDraw: function (chart, option) {
                     let theCenterText = "50%";
                     const canvasBounds = alunosProvinciaCanva.getBoundingClientRect();
                     const fontSz = Math.floor(canvasBounds.height * 0.10);
                     chart.ctx.textBaseline = 'middle';
                     chart.ctx.textAlign = 'center';
                     chart.ctx.font = fontSz + 'px Arial';
                     chart.ctx.fillText(theCenterText, canvasBounds.width / 2, canvasBounds.height * 0.70)
                     chart.ctx.save();
                 }
             }],
             /**/
            plugins: [
                /* {
             
                             beforeDraw:  (c)=> {
                                 var legends = c.legend.legendItems;
                                 legends.forEach( (e)=> {
                                     console.log(e)
                                     e.lineWidth=1;
                                     const color = e.fillStyle 
                                     e.strokeStyle=color;
                                     e.fillStyle = 'transparent';
                                 });
                             }
             
                         },*/
                {
                    id: 'text',
                    beforeDraw: function(chart, a, b) {
                        var width = chart.width,
                            height = chart.height,
                            ctx = chart.ctx;

                        ctx.restore();
                        var fontSize = (height * 0.03);
                        ctx.font = fontSize + "px Arial";
                        ctx.textBaseline = "middle";
                        ctx.textAlign = 'center';

                        var text = "230.900 Alunos",
                            textX = Math.round((width - ctx.measureText(text).width) / 2),
                            textY = height / 2;

                        ctx.fillText(text, textX, textY);
                        ctx.save();
                    }
                }
            ]
        });

        const alunosClasseCanva = document.getElementById('alunosClasse');
        const alunosClasseCtx = alunosClasseCanva.getContext('2d');
        const alunosClasse = new Chart(alunosClasseCtx, {
            type: 'bar',
            data: {
                labels: ['1ª Classe', '3ª Classe', '5ª Classe', '7ª Classe', '9ª Classe'],
                datasets: [{
                    label: 'Alunos por Provincias',
                    data: [2.7, 2.4, 1.8, 2.2, 2.6],
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
    </script>
    <script src="site/vendor/jquery/jquery.min.js"></script>
    <script src="site/vendor/popper/popper.min.js"></script>
    <script src="site/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="site/assets/js/all.js"></script>

</body>
