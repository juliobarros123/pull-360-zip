@extends('layouts._includes.site.app')

{{-- @section('titulo', ' Lista de classes') --}}

@section('conteudo')
    <section class="artes gallery  d-flex flex-row flex-wrap justify-content-center   mt--65">

        <div class="  box-72   mt-4  ">
            <ul class="p-0 d-flex flex-row-reverse w-100 ">

                <li class="font-13"> / <a href="" class="text-dark">IVANCEFÉLOPES</a> </li>
                <li class="font-13"> <a href="{{ route('timeline.fotos-galeria', ['slug' => Auth::User()->slug]) }}"
                        class="_text-color-3"> / GALERIA</a></li>
                <li class="font-13"> <a href="" class="_text-color-3"> PAINEL </a></li>
            </ul>


            <hr>





        </div>



    </section>


    <section class="_another-service bg-white  ">
        <div class="service ">
            <div class="box-72  ">
                <p class=" second-title ">ESTATÍSTICA</p>
                <p class=" mt-3">ITEM SELECIONADO PARA COMPRA: <small>1</small></p>

            </div>
        </div>


    </section>

    <section class="_another-service bg-white mb-5 pb-5 ">
        <div class="service ">
            <div class="box-72  ">
                <div class="row">
                    <div class="col-md-6">
                        <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
                    </div>


                    <div class="col-md-6">
                        <canvas id="myChart3" style="width:100%;max-width:600px"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="myChart4" style="width:100%;max-width:600px"></canvas>
                    </div>
                </div>
            </div>
        </div>


    </section>


    <script>
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("myChart1", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "World Wide Wine Production 2018"
                }
            }
        });
    </script>

    <script>
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("myChart2", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "World Wide Wine Production 2018"
                }
            }
        });
    </script>

    <script>
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = ["red", "green", "blue", "orange", "brown"];

        new Chart("myChart3", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "World Wine Production 2018"
                }
            }
        });
    </script>

    <script>
        var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
        var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

        new Chart("myChart4", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 6,
                            max: 16
                        }
                    }],
                }
            }
        });
    </script>
@endsection
