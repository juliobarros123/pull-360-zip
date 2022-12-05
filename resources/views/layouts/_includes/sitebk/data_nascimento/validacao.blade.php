<script>


$("#id_data_nascimento").change(function() {

var $this = $(this);
var data_digitada = $(this).val();
var max_date = $this.attr('max');
console.log(data_digitada > max_date);
$("#label_data_nascimento").empty();
if (data_digitada > max_date) {
    $("#label_data_nascimento").append("Precisa ser maior de idade para inscrever-se");
    $("#label_data_nascimento").css( "color", "red" );
}else{
  
    $("#label_data_nascimento").append("Data de nascimento aceitável");
    $("#label_data_nascimento").css( "color", "green" );
    //  = "Precisa ser maior de idade para inscrever-se ";
    // $("#label_data_nascimento").style.color = "red";
}
});

</script>