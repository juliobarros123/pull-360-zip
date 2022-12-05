</div> <!-- .wrapper -->

<script src="/painel/js/jquery.min.js"></script>
<script src="/painel/js/popper.min.js"></script>
<script src="/painel/js/moment.min.js"></script>
<script src="/painel/js/bootstrap.min.js"></script>
<script src="/painel/js/simplebar.min.js"></script>
<script src='/painel/js/daterangepicker.js'></script>
<script src='/painel/js/jquery.stickOnScroll.js'></script>
<script src="/painel/js/tinycolor-min.js"></script>
<script src="/painel/js/config.js"></script>
<script src="/painel/js/d3.min.js"></script>
<script src="/painel/js/topojson.min.js"></script>
<script src="/painel/js/datamaps.all.min.js"></script>
<script src="/painel/js/datamaps-zoomto.js"></script>
<script src="/painel/js/datamaps.custom.js"></script>
<script src="/painel/js/Chart.min.js"></script>



<script>
    let btn = document.querySelector('.lnr-eye');

    btn.addEventListener('click', function() {

        let input = document.querySelector('#password');

        if (input.getAttribute('type') == 'password') {
            input.setAttribute('type', 'text');
        } else {
            input.setAttribute('type', 'password');
        }

    });

    let view_pass_confirm = document.querySelector('.view-pass-confirm');
    view_pass_confirm.addEventListener('click', function() {

        let input = document.querySelector('#password_confirm');

        if (input.getAttribute('type') == 'password') {
            input.setAttribute('type', 'text');
        } else {
            input.setAttribute('type', 'password');
        }

    });
</script>


{{-- <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script> --}}
{{-- <script>
    // var estado = 1;
    $('#password').on('keyup', function() {
        var email = $("#password").val();
        console.log("o");
        var pathname = $(location).attr('pathname');
        console.log(pathname);
        if (email.length == 1 && pathname != '/login' ) {


            Swal.fire(
                'Atenção',
                'A palavra passe deve conter mais de 7 carácter es composto por números e carácter es especiais',
                'info'
            );
            // estado = 0;


        }
    });
</script> --}}
<script>
    // var estado = 1;

  
    $('#password').on('keyup', function(event) {
    
        var senha = $("#password").val();
    
        var pathname = $(location).attr('pathname');
      
        var elemento = document . getElementById ("span-senha") ;
        
        if (senha.length >0 && senha.length <=7 && pathname != '/login' ) { 
          
            elemento.innerHTML="A Senha deve conter mais de 7 carácter es composto por números e carácter es especiais";
            elemento.style.color="red";
            // Swal.fire(
            //     'Atenção',
            //     'A palavra passe deve conter mais de 7 carácter es composto por números e carácter es especiais',
            //     'info'
            // );
            estado = 0;
        }else if(senha.length ==0){
            elemento.innerHTML="Senha";
            elemento.style.color="white";
        }
        if(senha.length >7){
            elemento.innerHTML="Senha aceitável";
            elemento.style.color="green";
        }
        
    });
</script>
<script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src='/painel/js/jquery.lazyload.js'></script>
{{-- <script src='/painel/js/ajax.libs.jquery.1.9.1.jquery.js'></script> --}}
<script src="/painel/js/gauge.min.js"></script>
<script src="/painel/js/jquery.sparkline.min.js"></script>
<script src="/painel/js/apexcharts.min.js"></script>
<script src="/painel/js/apexcharts.custom.js"></script>
<script src='/painel/js/jquery.mask.min.js'></script>
<script src='/painel/js/select2.min.js'></script>
<script src='/painel/js/jquery.steps.min.js'></script>
<script src='/painel/js/jquery.validate.min.js'></script>
<script src='/painel/js/jquery.timepicker.js'></script>
<script src='/painel/js/dropzone.min.js'></script>
<script src='/painel/js/uppy.min.js'></script>
<script src='/painel/js/quill.min.js'></script>
<script src='/painel/js/jquery.dataTables.min.js'></script>
<script src='/painel/js/dataTables.bootstrap4.min.js'></script>


<script>
    var el = document.getElementById('cadUsuario');
    $(".form").click(function(e) {
        e.preventDefault();
        let gosto = e.target.id.split("_");
        let nao_gosto = e.target.id.split("_");


        if (gosto['0'] == "gostei") {

            var id_video = gosto['1'];

            var dados = $('#cadUsuario').serialize();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'reacoes_video/' + id_video + '/gostei',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: true,
                data: dados,
                success: function(response) {

                    document.getElementById("n_gostei_" + id_video).innerHTML = response[
                        'ttl_gosto'];
                    document.getElementById("n_nao_gostei_" + id_video).innerHTML = response[
                        'ttl_nao_gosto'];
                }
            });


        }

        if (nao_gosto['0'] == "naogostei") {

            var id_video = nao_gosto['1'];

            var dados = $('form').serialize();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'reacoes_video/' + id_video + '/nao_gostei',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                async: true,
                data: dados,

                success: function(response) {

                    document.getElementById("n_gostei_" + id_video).innerHTML = response[
                        'ttl_gosto'];
                    document.getElementById("n_nao_gostei_" + id_video).innerHTML = response[
                        'ttl_nao_gosto'];
                }


            });


        }

        // $('#naogostei').click(function() {

        // var dados = $('#cadUsuario').serialize();

        // console.log(dados);
        // $.ajax({
        // type: 'POST',
        // dataType: 'json',
        // url: 'reacoes_video/nao_gostei',
        // async: true,
        // data: dados,
        // success: function(response) {
        //     location.reload();
        // }
        // });

        // return false;
        // });

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
        // console.log("o");
        let pathname = $(location).attr('pathname');
        // console.log('kl' + user);
        let elemento = document.getElementById("span-user");
        let jjk = containsSpecialChars(user);     

        var dados = $('form').serialize();
        $.ajax({
            type: 'GET'
            , dataType: 'json'
            , url: `/admin/buscar-usuario/${user}`
            , async: true
            , data: dados,

            success: function(response) {
               
                let texto = 'nome de usuário não deve conter espaço em branco, acento ou carácter  especial';
                if (response.user != '') {
                    jjk = true;
                    texto = 'nome de usuário existente';     

                } else {
                    elemento.innerHTML = 'Nome de usuário*';
                }
                if(jjk==true){
                    document.getElementById("cabotao").disabled = true;
                }else{
                    document.getElementById("cabotao").disabled = false;
                }
                // console.log('teste' + jjk);
                jjk === true ? [elemento.style.color = "red"]: elemento.style.color = "black"
                jjk === true ? elemento.innerHTML =
                    texto : elemento.style.color = "black"              

            }


        });



    });

</script>


@if (session('acao_nao_autorizado'))
    <script src="/js/sweetalert2.all.min.js"></script>
    <script>
        Swal.fire(
            'Você não tem autorização para realizar esta ação!',
            '',
            'error'
        )
    </script>
@endif

<script src="/js/sweetalert2.all.min.js"></script>
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
{{-- <script>
 $('#gostei').click(function() {

    var dados = $('#cadUsuario').serialize();
    
console.log(dados);
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'reacoes_video/gostei',
        async: true,
        data: dados,
        success: function(response) {
            location.reload();
        }
    });

    return false;
});

$('#naogostei').click(function() {

var dados = $('#cadUsuario').serialize();

console.log(dados);
$.ajax({
    type: 'POST',
    dataType: 'json',
    url: 'reacoes_video/nao_gostei',
    async: true,
    data: dados,
    success: function(response) {
        location.reload();
    }
});

return false;
});

</script> --}}


<script>
    "use strict"

    var tempo_contagem = $("#tempo_contagem").text()
    var tempo_termino = $("#tempo_termino").text()
    var hh = 0;
    var mm = 0;
    var ss = 0;
    var tempo = 1000; //Quantos milésimos valem 1 segundo?
    var cron;
    //Inicia o temporizador
    cron = setInterval(() => {
        timer();
    }, tempo);

    //Para o temporizador mas não limpa as variáveis
    //Para o temporizador e limpa as variáveis
    //Faz a contagem do tempo e exibição
    function timer() {
        ss++; //Incrementa +1 na variável ss
        // alert(format);
        if (ss == 59) { //Verifica se deu 59 segundos
            ss = 0; //Volta os segundos para 0
            mm++; //Adiciona +1 na variável mm
            if (mm == 59) { //Verifica se deu 59 minutos
                mm = 0; //Volta os minutos para 0
                hh++; //Adiciona +1 na variável hora
            }
        }
        //Cria uma variável com o valor tratado HH:MM:SS
        var format = (hh < 10 ? '0' + hh : hh) + ':' + (mm < 10 ? '0' + mm : mm) + ':' + (ss < 10 ? '0' + ss : ss);
        // var tempo_limite = document.getElementById('tempo_limite');
        // console.log(tempo_limite.innerHTML + "|" + format);

        if (format == tempo_contagem) {
            function abreModal() {
                $("#exampleModal").modal({
                    show: true
                });
            }
            setTimeout(abreModal, 0);

        }
        // format=='00:01:00'
        if (format == tempo_termino) {
            $("#exampleModal").hide("slow")
            $("#sessao").click();
        }
        //Insere o valor tratado no elemento counter
        document.getElementById('counter').innerText = format;


        // if (ss > 4) {
        //     $('#corpo').removeAttr('hidden');
        //     $("#contador").hide();
        // }

        return format;
    }
    $("#reiniciar").click(function() {
        hh = 0;
        mm = 0;
        ss = 0;

        $("#myModal").modal({
            show: false
        });

    });
</script>

















<script>
    $('div[id^="tag"]').on('click', function() {
        console.log($(this).attr('value'));
        let id = $(this).attr('value')
        $.get("/materia/pdfJson/" + id, )
            .done(function(data) { // alert( "Data Loaded: " + data[0].vc_descricao_pdf );
                let extensao = data[0].vc_pdf.substr(data[0].vc_pdf.indexOf('.') + 1);
                $("#desc").html("<dd>" + data[0].vc_descricao_pdf + "</dd>")
                $("#dado")
                    .html("<dt class='col-6 text-muted'>Tipo de Arquivo</dt> <dd class='col-6'>" +
                        extensao + "</dd> <dt class='col-6 text-muted'>Tamanho</dt> <dd class='col-6'>" +
                        data[0].it_size_pdf + " MB" +
                        "</dd> <dt class='col-6 text-muted'>Data do Lançamento</dt> <dd class='col-6' id='criacao'>" +
                        data[0].created_at +
                        "</dd> <dt class='col-6 text-muted'>Ultima atualização</dt> <dd class='col-6' id='atualizacao'>" +
                        data[0].updated_at + "</dd> ")
            });
    });
</script>

<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
        ]
    });
</script>
<script src="/js/sweetalert2.all.min.js"></script>

<script>
    $('.select2').select2({
        theme: 'bootstrap4',
    });
    $('.select2-multi').select2({
        multiple: true,
        theme: 'bootstrap4',
    });
    $('.drgpicker').daterangepicker({
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale: {
            format: 'MM/DD/YYYY'
        }
    });
    $('.time-input').timepicker({
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
    });
    /** date range picker */
    if ($('.datetimes').length) {
        $('.datetimes').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'M/DD hh:mm A'
            }
        });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                'month')]
        }
    }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000", {
        placeholder: "__/__/____"
    });
    $('.input-zip').mask('00000-000', {
        placeholder: "____-___"
    });
    $('.input-money').mask("#.##0,00", {
        reverse: true
    });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/,
                optional: true
            }
        },
        placeholder: "___.___.___.___"
    });
    // editor
    var editor = document.getElementById('editor');
    if (editor) {
        var toolbarOptions = [
            [{
                'font': []
            }],
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{
                    'header': 1
                },
                {
                    'header': 2
                }
            ],
            [{
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }
            ],
            [{
                    'script': 'sub'
                },
                {
                    'script': 'super'
                }
            ],
            [{
                    'indent': '-1'
                },
                {
                    'indent': '+1'
                }
            ], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction
            [{
                    'color': []
                },
                {
                    'background': []
                }
            ], // dropdown with defaults from theme
            [{
                'align': []
            }],
            ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor, {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


<script>
    function mudarCor(novaCor) {
        var elemento = document.getElementById("scroller");
        elemento.style.overflow = "hidden !important";
    }
</script>

<style>
    /* style a mexer */
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 35px;
        user-select: none;
        -webkit-user-select: none;

    }

</style>
@include('layouts._includes.painel.data_nascimento.validacao')
@include('layouts._includes.painel.data_nascimento.validacaoFilho')
<script type="text/javascript">
    $('.buscarEscola').select2({
        placeholder: 'Selecionar Escola',
        ajax: {
            url: '/buscar/escolas',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                console.log('aqui', data)

                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.vc_escola,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('.buscarClasse').select2({
        placeholder: 'Selecionar a classe',
        ajax: {
            url: '/buscar/classes',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                console.log('aqui', data)

                return {
                    results: $.map(data, function(item) {
                        return {
                            text: `${item.vc_classe} ª Classe`,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });



    $('.buscarAnoLetivo').select2({
        placeholder: 'Selecionar o ano lectivo',
        ajax: {
            url: '/buscar/anoletivo',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                console.log('aqui', data)

                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.ya_inicio + '-' + item.ya_fim,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });



    $('.buscarDiasSemana').select2({
        placeholder: 'Selecionar o dia da semana',
        ajax: {
            url: '/buscar/diasSemana',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                console.log('aqui', data)

                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.vc_dia,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>

<script>
    $("#img-input").click(function() {
        $("#image_visible").hide();
    });
</script>

<script>
    function readImage() {
        if (this.files && this.files[0]) {
            var file = new FileReader();
            file.onload = function(e) {
                document.getElementById("preview").src = e.target.result;
            };
            file.readAsDataURL(this.files[0]);
        }
    }

    document.getElementById("img-input").addEventListener("change", readImage, false);
</script>
<script src="/painel/js/apps.js"></script>


<script>
    var el = document.getElementById('video');
    el.addEventListener('click', function(e) {
        alert(e.target.id);
    });
</script>



<script src="/js/videoplayer.js"></script>

<script>
    var controls = [
        'play-large', // The large play button in the center
        // 'restart', // Restart playback
        // 'rewind', // Rewind by the seek time (default 10 seconds)
        'play', // Play/pause playback
        'ratio',
        'fast-forward', // Fast forward by the seek time (default 10 seconds)
        'progress', // The progress bar and scrubber for playback and buffering
        'current-time', // The current time of playback
        'duration', // The full duration of the media
        'mute', // Toggle mute
        'volume', // Volume control
        // 'captions', // Toggle captions
        'settings', // Settings menu
        'pip', // Picture-in-picture (currently Safari only)
        'airplay', // Airplay (currently Safari only)
        // 'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
        'fullscreen' // Toggle fullscreen
    ];

    const player = new Plyr('.vid1', {
        controls
    });
</script>


<script src="/js/sweetalert2.all.min.js"></script>

@if (session('status_demo'))
    <script>
        Swal.fire(
            'Cadastro finalizado com sucesso!',
            '',
            'success'
        )

    </script>
@endif

</body>

</html>
