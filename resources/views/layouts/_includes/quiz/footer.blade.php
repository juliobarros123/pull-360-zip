
   <div class="container pb-5 mt-5 ">
    <div class="row">
      <div class="col-md-4 d-flex justify-content-center">
        <img src="/quiz/img/logo-angola.png" width="190" alt="">
      </div>
      <div class="col-md-4 d-flex justify-content-center">
        <img src="/quiz/img/educação.jpg" width="190" alt="">
      </div>
      <div class="col-md-4 d-flex justify-content-center">
        <img src="/quiz/img/minttics.png" width="190" alt="">
      </div>
    </div>
  </div>

    <footer id="rodape">
        <div class="container">
          <div class="row">
            <div class="col-md-10">
              <p> &copy;Todos os Direitos Reservados 2021-Xilonga</p>
            </div>
            <div class="col-md-2" id="lateral">
              <a href=""><img src="/quiz/img/facebook (1).svg" alt=""></a>
              <a href=""><img src="/quiz/img/instagram.svg" alt=""></a>
              <a href=""><img src="/quiz/img/linkedin.svg" alt=""></a>
              <a href=""><img src="/quiz/img/youtube.svg" alt=""></a>
            </div>
    
          </div>
        </div>
      </footer>

 <script src="/quiz/js/bootstrap.min.js" ></script>
 <script src="/quiz/js/jquery-3.3.1.slim.min.js" ></script>
 <script src="/quiz/js/popper.min.js" ></script>
 <script src="/site/js/jquery.min.js"></script>

    <script src="/site/js/isotope.min.js"></script>



    <script src="/site/js/scripts.js"></script>
    {{-- Meus scrypts --}}



    
    <!-- lazy load -->
    <script src="https://cdn.jsdelivr.net/npm/progressive-image.js/dist/progressive-image.js"></script>
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
    // format>= tempo_limite.innerHTML
      
       if (false) {
           function abreModal() {
           
            if(!$('#myModal').is(':visible')){
            $("#btn_sem_tempo").click();
           }

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

<script type="text/javascript">
        window.history.forward();
    
            window.history.forward();
        
    </script>
    

