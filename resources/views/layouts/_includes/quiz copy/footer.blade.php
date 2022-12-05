
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    var audio = document.getElementById('audio');
      
   audio.play();
   let a = 0;

   $("#icon").click(function() {
       if (a == 1) {
           audio.play();
           a = 0;
       } else {
           audio.pause();
           a = 1;
       }
   });
</script>

<script>
   "use strict"

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
       var tempo_limite = document.getElementById('tempo_limite');
       console.log(tempo_limite.innerHTML + "|" + format);
      
       if (format>= tempo_limite.innerHTML) {
           function abreModal() {
               $("#myModal").modal({
                   show: true
               });
           }

           setTimeout(abreModal, 0);

           $("#corpo").hide();
       }

       //Insere o valor tratado no elemento counter
       document.getElementById('counter').innerText = format;
       if (ss > 4) {
           $('#corpo').removeAttr('hidden');

           $("#contador").hide();
       }


      
       return format;
   }
</script>