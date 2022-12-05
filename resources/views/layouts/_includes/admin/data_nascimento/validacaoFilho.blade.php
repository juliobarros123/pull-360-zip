<script>


    $("#id_data_nascimento_filho").change(function() {
       
    var $this = $(this);
    var data_digitada = $(this).val();
    var max_date = $this.attr('max');
    console.log(data_digitada > max_date);
    $("#label_data_nascimento_filho").empty();
    if (data_digitada > max_date) {
        $("#label_data_nascimento_filho").append("Precisa ter 5 anos ou mais");
        $("#label_data_nascimento_filho").css( "color", "red" );
    }else{
      
        $("#label_data_nascimento_filho").append("Data de nascimento aceitável");
        $("#label_data_nascimento_filho").css( "color", "green" );
        //  = "Precisa ser maior de idade para inscrever-se ";
        // $("#label_data_nascimento_filho").style.color = "red";
    }
    });
    
    </script>