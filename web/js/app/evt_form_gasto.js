$(function() {
    $( "#idconcepto_gasto" ).focus();    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#idconcepto_gasto" ).required();        
        bval = bval && $( "#descripcion" ).required();        
        bval = bval && $( "#fecha" ).required();        
        bval = bval && $( "#monto" ).required();
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});