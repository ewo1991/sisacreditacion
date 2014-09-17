$(function() {
    
    $( "#decripcioncomision" ).focus();   
    $("#fecha_inicio").datepicker({'dateFormat':'dd/mm/yy'});  
    $("#fecha_termino").datepicker({'dateFormat':'dd/mm/yy'}); 
    $( "#save" ).click(function(){
        bval = true;  
        bval = bval && $( "#decripcioncomision" ).required();
        bval = bval && $( "#CodigoDptoAcad" ).required();
        bval = bval && $( "#resolucion" ).required();
        bval = bval && $( "#fecha_inicio" ).required();
        bval = bval && $( "#fecha_termino" ).required();
      
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});