function crear_modo_sin_cargo(){
   window.location='index.php?controller=evento&action=create&modo_sin_cargo=true';
}
$(function() {
    $( "#tema" ).focus();  
   
    $("#fecha").datepicker({'dateFormat':'yy/mm/dd'}); 
    $( "#save" ).click(function(){
        bval = true;       
        bval = bval && $( "#tema" ).required();
        bval = bval && $( "#idtipo_evento" ).required();
        bval = bval && $( "#CodigoSemestre" ).required();
        bval = bval && $( "#fecha" ).required();
   
        if ( bval ) {
            $("#frm").submit();
                    }
        return false;
    });   
});