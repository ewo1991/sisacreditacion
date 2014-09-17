$(function() {
    $( "#precio" ).focus();    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#precio" ).required();
        bval = bval && $( "#origen" ).required();        
        bval = bval && $( "#destino" ).required();        
        bval = bval && $( "#horasalida" ).required();        
        bval = bval && $( "#horallegada" ).required();        
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});